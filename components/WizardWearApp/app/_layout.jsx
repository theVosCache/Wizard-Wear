import React from 'react';
import {ImageBackground, SafeAreaView} from 'react-native';
import {Slot} from "expo-router";

import BaseLayoutStyle from "../style/Layouts/BaseLayout";
import AssetUri from "../assets/AssetUri";
import {Provider} from "react-redux";
import store from "../Redux";

export default function Layout() {
    return <Provider store={store}>
        <ImageBackground source={{uri: AssetUri.parchment}} style={BaseLayoutStyle.backgroundImage}>
            <SafeAreaView style={BaseLayoutStyle.container}>
                <Slot/>
            </SafeAreaView>
        </ImageBackground>
    </Provider>
};
