import {StyleSheet} from "react-native";

export default {
    main: StyleSheet.create({
        container: {
            flex: 1,
            paddingTop: 5,
            width: '100%',
        },
        centered: {
            alignItems: 'center',
            textAlign: 'center'
        },
        input: {
            backgroundColor: '#fff',
            width: '95%',
            height: 40,
            margin: 12,
            borderWidth: 1,
            padding: 10,
        },
        image: {
            flex: 1,
            resizeMode: 'contain',
        },
    }),
    buttons: StyleSheet.create({
        black: {
            backgroundColor: '#000',
            padding: 15,
            width: '95%',
            alignItems: 'center',
            justifyContent: 'center',
        },
    }),
    text: StyleSheet.create({
        white: {
            color: '#fff',
        }
    })
}