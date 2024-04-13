import ActionNames from "../ActionNames";

export default function userReducer(state = {
    user: {},
    characters: [],
    items: []
}, action) {
    switch (action.type) {
        case ActionNames.USER_LOAD:
            return {
                ...state,
                user: action.user,
                characters: action.characters,
                items: action.items
            }
        default:
            return state
    }
}
