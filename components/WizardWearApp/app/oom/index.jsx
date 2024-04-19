import React, {Component} from 'react';
import {Image, ImageBackground, Pressable, Text, TextInput, View} from 'react-native';

import AssetUri from "../../assets/AssetUri";
import OomLayoutStyle from "../../style/Layouts/OomLayout";
import {connect} from "react-redux";
import Card from "../../Components/Card";
import UserItem from "../../Components/UserItem";

class Dashboard extends Component {
    constructor(props) {
        super(props);
    }

    renderItems() {
        return this.props.items.map((item, index) => {
            return <UserItem item={item} key={index}/>
        })
    }

    render() {
        return (
            <View style={OomLayoutStyle.container}>
                <Card header={'Your Items'}>
                    {this.renderItems()}
                </Card>
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