import { Asset } from "expo-asset";

export default {
    parchment: Asset.fromModule(require("./parchment-background.png")).uri,
    oom: Asset.fromModule(require("./oom-logo.png")).uri,
    ww: Asset.fromModule(require("./ww-logo.png")).uri,
}