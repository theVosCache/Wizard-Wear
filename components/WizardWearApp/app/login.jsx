import React from 'react';
import {router} from "expo-router";
import {Image, Pressable, Text, TextInput, View} from 'react-native';

import LoginScreenStyle from "../style/Screens/LoginScreen";
import AssetUri from "../assets/AssetUri";
import Api from "../api/Api";

async function handleLogin(email, password) {
    let api = new Api();
    let response = await api.login(email, password);

    if (response === false) {
        return alert('Authentication Error.');
    }

    router.navigate('/oom');
}

export default function Login() {
    const [email, onChangeEmail] = React.useState('matthijs@test.nl');
    const [password, onChangePassword] = React.useState('test');

    return <View style={LoginScreenStyle.container}>
        <View style={LoginScreenStyle.container}>
            <Image source={{uri: AssetUri.oom}} style={LoginScreenStyle.image} height={250} width={250}/>
        </View>
        <View style={LoginScreenStyle.container}>
            <TextInput
                style={{...LoginScreenStyle.textInput}}
                onChangeText={onChangeEmail}
                placeholder={"Email"}
                value={email}
            />
            <TextInput
                style={LoginScreenStyle.textInput}
                onChangeText={onChangePassword}
                placeholder={"password"}
                secureTextEntry={true}
                value={password}
            />
            <Pressable style={LoginScreenStyle.button} onPress={() => handleLogin(email, password)}>
                <Text style={LoginScreenStyle.buttonLabel}>Inloggen</Text>
            </Pressable>
        </View>
        <View style={LoginScreenStyle.container}>
            <Image source={{uri: AssetUri.ww}} style={LoginScreenStyle.image} height={150} width={250} resizeMode={'contain'}/>
        </View>
    </View>
};