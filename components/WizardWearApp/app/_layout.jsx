import React from 'react';
import {ImageBackground, SafeAreaView} from 'react-native';
import {Slot} from "expo-router";

import BaseLayoutStyle from "../style/Layouts/BaseLayout";
import AssetUri from "../assets/AssetUri";

export default function Layout() {
    return <ImageBackground source={{uri: AssetUri.parchment}} style={BaseLayoutStyle.backgroundImage}>
        <SafeAreaView style={BaseLayoutStyle.container}>
            <Slot/>
        </SafeAreaView>
    </ImageBackground>
};
