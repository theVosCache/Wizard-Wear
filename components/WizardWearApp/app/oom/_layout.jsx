import React from 'react';
import {Image, SafeAreaView, View, Text} from 'react-native';
import {Slot} from "expo-router";
import {connect} from "react-redux";

import AssetUri from "../../assets/AssetUri";
import OomLayoutStyle from "../../style/Layouts/OomLayout";

class OomLayout extends React.Component {
    constructor(props) {
        super(props);
    }


    render(){
        if (this.props.characters !== undefined && this.props.characters.length > 0) {
            this.house_crest_uri = this.props.characters[0].house_crest_img_path;
        }else {
            this.house_crest_uri = '';
        }

        return (
            <View style={OomLayoutStyle.flex}>
                <SafeAreaView style={OomLayoutStyle.flex}>
                    <View style={OomLayoutStyle.headerBar}>
                        <Image source={{uri: AssetUri.oom}} style={OomLayoutStyle.headerImage} />
                        <Text>{this.props.user.name}</Text>
                        <Image src={this.house_crest_uri} style={OomLayoutStyle.headerImage} />
                    </View>
                    <View style={OomLayoutStyle.container}>
                        <Slot/>
                    </View>
                </SafeAreaView>
            </View>
        )
    }
}

function mapStateToProps(state){
    return {
        user: state.user.user,
        characters: state.user.characters
    }
}

export default connect(mapStateToProps)(OomLayout)