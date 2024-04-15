import React, {Component} from 'react';
import {Image, ImageBackground, Pressable, Text, TextInput, View} from 'react-native';

import AssetUri from "../../assets/AssetUri";
import OomLayoutStyle from "../../style/Layouts/OomLayout";

class Dashboard extends Component {
    constructor(props) {
        super(props);
    }

    render() {
        return (
            <ImageBackground source={{uri: AssetUri.oom}} style={OomLayoutStyle.backgroundImage}>
                <View style={OomLayoutStyle.container}>
                </View>
            </ImageBackground>
        )
    }
}

export default Dashboard;