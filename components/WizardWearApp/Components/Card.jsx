import React, {Component} from 'react';
import {ImageBackground, StyleSheet, Text, View} from 'react-native';
import AssetUri from "../assets/AssetUri";

class Card extends Component {
    constructor(props) {
        super(props);

        this.state = {
            header: ''
        }
    }

    componentDidMount() {
        this.setState({
            header: this.props.header
        })
    }

    render() {
        return (
            <ImageBackground source={{uri: AssetUri.parchment}} style={Style.container}>
                <View style={Style.container}>
                    <View style={Style.header}>
                        <Text>{this.state.header}</Text>
                    </View>

                    {this.props.children}
                </View>
            </ImageBackground>
        )
    }
}

const Style = StyleSheet.create({
    container: {
        resizeMode: 'contain',
        borderRadius: 5,
        paddingBottom: 10,
        height: 'auto',
        width: '100%',

        alignItems: 'center',
        textAlign: 'center'
    },

    header: {
        height: 'auto',
        width: '100%',
        borderTopStartRadius: 5,
        borderTopEndRadius: 5,

        alignItems: 'center',
        textAlign: 'center',

        marginBottom: 10
    },
})

export default Card