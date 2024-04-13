import Base from "../base";
import {StyleSheet} from "react-native";

export default StyleSheet.create({
    container: StyleSheet.create({
        ...Base.main.container,
        ...Base.main.centered
    }),
    containerVCentered: StyleSheet.create({
        ...Base.main.container,
        ...Base.main.centered,
        justifyContent: 'center',
        alignSelf: 'center',
        alignItems:'center',
    }),
    image: Base.main.image,
})