import ActionNames from "../ActionNames";
import * as SecureStore from "expo-secure-store";

import Api from "../../api/Api";

export async function loadUserData() {
    let api = new Api();

    let userData = await api.user();

    return {
        type: ActionNames.USER_LOAD,
        user: userData.user,
        items: userData.items,
        characters: userData.characters
    }
}