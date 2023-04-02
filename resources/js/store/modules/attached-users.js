import { vueFetch } from "use-lightweight-fetch";

// get users
const {
    handleData: handleGetUsers,
    fetchedData: fetchedUsers,
    isError: isErrorUsers,
    isLoading: isLoadingUsers,
    isSuccess: isSuccessUsers,
} = vueFetch();

export default {
    namespaced: true,

    // state
    state: {
        users: [],
        attachedUsers: [],
        // end state
    },

    // getters
    getters: {
        getCurrentUsers(state) {
            return state.users;
        },
        getCurrentAttachedUsers(state) {
            return state.attachedUsers;
        },
        // end getters
    },

    // mutations
    mutations: {
        setCurrentUsers(state, payload) {
            state.users = payload;
        },

        setCurrentAttachedUsers(state, payload) {
            // check if user already exists in the array
            const userExists = state.attachedUsers.some(
                (user) => user.id === payload.id
            );

            // if user does not exist, push to array
            if (userExists === false) {
                state.attachedUsers.unshift(payload);
            }
        },
        setRemoveAttachedUser(state, payload) {
            state.attachedUsers = payload;
        },

        // end mutations
    },

    // actions
    actions: {
        // get users
        async loadUsers(context, data) {
            if (data.search_query === undefined) {
                data.search_query = "";
            }
            if (data.page === undefined) {
                data.page = "";
            }

            // fetch users
            // handleGetUsers(
            //     `/overview/attach/users/index/${data.teamId}/?search_query=${data.search_query}&page=${data.page}`
            // );

            const res = await fetch(
                `/overview/attach/users/index/${data.teamId}/?search_query=${data.search_query}&page=${data.page}`
            );

            const data2 = await res.json();
            console.log("data er:", data2);

            // context & send to mutation
            context.commit("setCurrentUsers", {
                fetchedData: data2,
                isError: isErrorUsers,
                isLoading: isLoadingUsers,
                isSuccess: isSuccessUsers,
            });
        },
        // end action
    },
};
