import Base from "../base";
import {StyleSheet} from "react-native";

export default StyleSheet.create({
    flex: {
        flex: 1,
    },

    flexRow: {
        flex: 1,
        flexDirection: 'row',
        maxHeight: "15%",

        marginVertical: 5
    },

    container: {
        flex: 1,
        height: '95%',
        paddingTop: 20,
        paddingHorizontal: 5,
    },

    button: {
        backgroundColor: 'rgba(0,0,0,0.6)',
        flex: 1,
        marginHorizontal: 5,
        alignItems: 'center',
        justifyContent: 'center',
    },
    buttonLabel: Base.text.white,
});