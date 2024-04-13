import Endpoints from "./endpoints";
import Axios from "axios";
import * as SecureStore from "expo-secure-store";

class Api {
    TOKEN = 'api_token'
    axios;

    constructor() {
        this.axios = Axios.create({
            baseURL: Endpoints.host + Endpoints.basePath,
            headers: {
                Accept: "application/json",
            }
        })
    }

    static async healthCheck() {
        try {
            const response = await Axios.get(Endpoints.host + Endpoints.health);
            return response.status === Axios.HttpStatusCode.Ok;
        } catch (error) {
            return false;
        }
    }

    async login(email, password) {
        try {
            const response = await this.axios.post(Endpoints.auth.login, {
                email: email,
                password: password
            });

            await this.save(this.TOKEN, response.data.token)

            return response.data;
        } catch (error) {
            return false;
        }
    }

    async logout() {
        let response = await this.axios.delete(Endpoints.auth.logout, {
            headers: {
                Authorization: `Bearer ${await this.getValueFor(this.TOKEN)}`
            }
        })

        return response.status === 200;
    }

    async user() {
        try {
            const response = await this.axios.get(Endpoints.user, {
                headers: {
                    Authorization: `Bearer ${await this.getValueFor(this.TOKEN)}`
                }
            });

            return response.data;
        } catch (error) {
            return false;
        }
    }

    async save(key, value) {
        await SecureStore.setItemAsync(key, value);
    }

    async getValueFor(key) {
        return await SecureStore.getItemAsync(key);
    }
}

export default Api;