import Base from "../base";
import {StyleSheet} from "react-native";

export default StyleSheet.create({
    container: {
        ...Base.main.container,
        ...Base.main.centered
    },
    image: Base.main.image,
    textInput: Base.main.input,
    button: Base.buttons.black,
    buttonLabel: Base.text.white,
})