import Base from "../base";
import {StyleSheet} from "react-native";

export default StyleSheet.create({
    backgroundImage: StyleSheet.create({
        flex: 1,
        resizeMode: 'contain'
    }),

    flex: {
        flex: 1,
    },
    headerBar: {
        width: '100%',
        height: '5%',
        paddingHorizontal: 10,
        flexDirection: 'row',
        justifyContent: 'space-between',
        alignItems:'center'
    },
    headerImage: {
        resizeMode: 'contain',
        height: '100%',
        width: 50
    },
    container: {
        width: '100%',
        height: '95%'
    }
})