import React from 'react';
import {router} from "expo-router";
import {Image, Pressable, Text, TextInput, View} from 'react-native';

import LoginScreenStyle from "../style/Screens/LoginScreen";
import AssetUri from "../assets/AssetUri";
import Api from "../api/Api";

class LoginScreen extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            email: 'matthijs@test.nl',
            password: 'test'
        }
    }

    async handleLogin(email, password) {
        let api = new Api();
        let response = await api.login(this.state.email, this.state.password);

        if (response === false) {
            return alert('Authentication Error.');
        }

        router.navigate('/oom');
    }

    render() {
        return (
            <View style={LoginScreenStyle.container}>
                <View style={LoginScreenStyle.container}>
                    <Image source={{uri: AssetUri.oom}} style={LoginScreenStyle.image} height={250} width={250}/>
                </View>
                <View style={LoginScreenStyle.container}>
                    <TextInput
                        style={{...LoginScreenStyle.textInput}}
                        placeholder={"Email"}
                        onChangeText={(text) => this.setState({ email: text })}
                        value={this.state.email}
                    />
                    <TextInput
                        style={LoginScreenStyle.textInput}
                        placeholder={"password"}
                        onChangeText={(text) => this.setState({ password: text })}
                        secureTextEntry={true}
                        value={this.state.password}
                    />
                    <Pressable style={LoginScreenStyle.button} onPress={() => this.handleLogin()}>
                        <Text style={LoginScreenStyle.buttonLabel}>Inloggen</Text>
                    </Pressable>
                </View>
                <View style={LoginScreenStyle.container}>
                    <Image source={{uri: AssetUri.ww}} style={LoginScreenStyle.image} height={150} width={250} resizeMode={'contain'}/>
                </View>
            </View>
        )
    }
}

export default LoginScreen;