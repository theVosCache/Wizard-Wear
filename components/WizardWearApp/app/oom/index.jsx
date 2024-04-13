import React, {Component} from 'react';
import {Image, Pressable, Text, TextInput, View} from 'react-native';
import LoginScreenStyle from "../../style/Screens/LoginScreen";
import AssetUri from "../../assets/AssetUri";

class Dashboard extends Component {
    constructor(props) {
        super(props);
    }

    render() {
        return (
            <View style={LoginScreenStyle.container}>
                <View style={LoginScreenStyle.container}>
                    <Image source={{uri: AssetUri.oom}} style={LoginScreenStyle.image} height={250} width={250}/>
                </View>
            </View>
        )
    }
}

export default Dashboard;