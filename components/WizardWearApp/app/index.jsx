import React from 'react';
import {router} from "expo-router";
import {Image, Text, View} from 'react-native';
import * as Progress from 'react-native-progress';

import SplashScreenStyle from "../style/Screens/SplashScreen";
import AssetUri from "../assets/AssetUri";
import Api from "../api/Api";
import {loadUserData} from '../Redux/Actions/UserActions'
import {connect} from "react-redux";

function timeout(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

class App extends React.Component {
    constructor(props) {
        super(props);

        this.api = new Api();
        this.state = {
            text: '',
            progress: 0
        }
    }

    async componentDidMount() {
        await this.checkApiHealth();
        await timeout(1000);
        let path = await this.checkForToken();
        await timeout(1000);
        await this.redirect(path);
    }

    async checkApiHealth() {
        if (await Api.healthCheck()) {
            this.setState({
                text: 'Connected to API',
                progress: 0.25
            })
        }
    }

    async checkForToken() {
        if (await this.api.getValueFor(this.api.TOKEN) !== null) {
            this.setState({
                text: 'Loaded the User token',
                progress: 0.5
            })
            this.props.dispatch(await loadUserData())
            await timeout(500)
            this.setState({
                text: 'Loaded your data',
                progress: 0.75
            })

            return '/oom'
        } else {
            this.setState({
                text: 'Unable to find token',
                progress: 0.5
            })
            return '/login'
        }
    }

    async redirect(path){
        if (path === '/login'){
            this.setState({
                text: 'Loading login',
                progress: 1
            })
            await timeout(1000)
            router.navigate('/login')
        } else {
            this.setState({
                text: 'Done',
                progress: 1
            })
            await timeout(500)
            router.navigate('/oom')
        }
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

function mapStateToProps(state) {
    return {user: state.user}
}

export default connect(mapStateToProps)(App)