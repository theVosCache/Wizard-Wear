import React from 'react';
import {Image, ImageBackground, Pressable, StyleSheet, Text, TextInput, View} from 'react-native';
import {Asset} from "expo-asset";

import Style from "../style";
import LoginScreenStyle from "../style/Screens/LoginScreen";

const image = {uri: Asset.fromModule(require("../assets/oom-logo.png")).uri};
const ww = {uri: Asset.fromModule(require("../assets/ww-logo.png")).uri};

export default function App() {
    const [email, onChangeEmail] = React.useState('');
    const [password, onChangePassword] = React.useState('');

    return <View style={LoginScreenStyle.container}>
        <View style={LoginScreenStyle.container}>
            <Image source={image} style={LoginScreenStyle.image} height={250} width={250}/>
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
            <Pressable style={LoginScreenStyle.button} onPress={() => alert('You pressed a button.')}>
                <Text style={LoginScreenStyle.buttonLabel}>Inloggen</Text>
            </Pressable>
        </View>
        <View style={LoginScreenStyle.container}>
            <Image source={ww} style={LoginScreenStyle.image} height={150} width={250} resizeMode={'contain'}/>
        </View>
    </View>
};