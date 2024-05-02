import React, {Component} from 'react';
import {Image, ImageBackground, Pressable, Text, TextInput, View} from 'react-native';

import AssetUri from "../../assets/AssetUri";
import OomLayoutStyle from "../../style/Layouts/OomLayout";
import OomIndexScreenStyle from "../../style/Screens/OomIndexScreen";
import {connect} from "react-redux";

class Dashboard extends Component {
    constructor(props) {
        super(props);
    }

    render() {
        return (
            <View style={OomIndexScreenStyle.container}>
                <View style={OomIndexScreenStyle.flexRow}>
                    <Pressable style={OomIndexScreenStyle.button}>
                        <Text style={OomIndexScreenStyle.buttonLabel}>Events</Text>
                    </Pressable>
                </View>
                <View style={OomIndexScreenStyle.flexRow}>
                    <Pressable style={OomIndexScreenStyle.button}>
                        <Text style={OomIndexScreenStyle.buttonLabel}>Your Items</Text>
                    </Pressable>
                    <Pressable style={OomIndexScreenStyle.button}>
                        <Text style={OomIndexScreenStyle.buttonLabel}>Your Characters</Text>
                    </Pressable>
                </View>
            </View>
        )
    }
}

function mapStateToProps(state) {
    return {
        user: state.user.user,
        characters: state.user.characters,
        items: state.user.items,
    }
}

export default connect(mapStateToProps)(Dashboard)