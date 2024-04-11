import React from 'react';
import {ImageBackground, SafeAreaView, StyleSheet} from 'react-native';
import { Asset } from "expo-asset";
import {Slot} from "expo-router";

import Style from "../style";
import BaseLayoutStyle from "../style/Layouts/BaseLayout";

const image = { uri: Asset.fromModule(require("../assets/parchment-background.png")).uri };

const App = () => (
    <ImageBackground source={image} style={BaseLayoutStyle.backgroundImage}>
        <SafeAreaView style={BaseLayoutStyle.container}>
            <Slot />
        </SafeAreaView>
    </ImageBackground>
);

export default App;
