import React from 'react';
import {router} from "expo-router";
import {Image, Text, View} from 'react-native';
import * as Progress from 'react-native-progress';


import SplashScreenStyle from "../style/Screens/SplashScreen";
import AssetUri from "../assets/AssetUri";
import Api from "../api/Api";

class App extends React.Component {
    constructor(props) {
        super(props);

        this.api = new Api();
        this.state = {
            text: '',
            progress: 0
        }
    }

    componentDidMount() {
        this.check();
    }

    async check() {
        let api = new Api();
        if (await Api.healthCheck()) {
            this.setState({
                text: 'Connected to API',
                progress: 0.25
            })
        }
        setTimeout(async () => {
            if (await api.getValueFor(api.TOKEN) !== null) {
                this.setState({
                    text: 'Loading the User token',
                    progress: 0.5
                })
            }

            setTimeout(async () => {
                if (await api.user() !== false) {
                    this.setState({
                        text: 'Token validated',
                        progress: 0.75
                    })
                } else {
                    this.setState({
                        text: 'Unable to validate token',
                        progress: 0.75
                    })
                    setTimeout(async () => {
                        // router.navigate('/login')
                    }, 1000)
                }
            }, 500)
        }, 500);

    }

    render() {
        let progress = this.state.progress;

        return (
            <View style={SplashScreenStyle.container}>
                <View style={SplashScreenStyle.container}>
                    <Image source={{uri: AssetUri.oom}} style={SplashScreenStyle.image} height={250} width={250}/>
                </View>
                <View style={SplashScreenStyle.containerVCentered}>
                    <Progress.Bar progress={progress} width={250} height={15}/>
                    <Text>{this.state.text}</Text>
                </View>
                <View style={SplashScreenStyle.container}>
                    <Image source={{uri: AssetUri.ww}} style={SplashScreenStyle.image} height={150} width={250}/>
                </View>
            </View>
        )
    }
}

export default App