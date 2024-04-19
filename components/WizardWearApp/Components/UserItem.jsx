import React, {Component} from 'react';
import {Image, ImageBackground, StyleSheet, Text, View} from 'react-native';
import AssetUri from "../assets/AssetUri";

class UserItem extends Component {
    constructor(props) {
        super(props);

        this.state = {
            item: {}
        }
    }

    componentDidMount() {
        this.setState({
            item: this.props.item
        })
    }

    render() {
        let imageSource = '';
        if (this.state.item.avatar_path !== undefined) {
            imageSource = this.state.item.avatar_path;
        }

        if (imageSource !== '') {
            return (
                <View style={{width: '100%', height: 100, flexDirection: 'row', marginBottom: 5}}>
                    <Image
                        src={imageSource}
                        width={250}
                        style={{flex: 1, resizeMode: 'contain'}}
                    />
                    <View style={{flex: 2}}>
                        <Text>{this.state.item.name}</Text>
                        <Text>{this.state.item.description}</Text>
                    </View>
                </View>
            )
        }

        return (
            <View style={{width: '100%', height: 'auto', flexDirection: 'row'}}>
                <Text>No Image Provided</Text>
                <Text>{this.state.item.name}</Text>
            </View>
        )
    }
}

export default UserItem