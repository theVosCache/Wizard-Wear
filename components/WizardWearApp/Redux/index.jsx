import {legacy_createStore as createStore, applyMiddleware} from 'redux';
import axios from 'axios';
import axiosMiddleware from 'redux-axios-middleware';
import RootReducer from "./Reducers/RootReducer";

const client = axios.create({
    baseURL: 'http://localhost:8080/api',
    responseType: 'json'
});

let store = createStore(
    RootReducer, //custom reducers
    applyMiddleware(
        axiosMiddleware(client),
    )
)

export default store;