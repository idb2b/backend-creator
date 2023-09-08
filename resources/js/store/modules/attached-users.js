import { vueFetch } from "use-lightweight-fetch";

// get users
const {
    handleData: handleGetUsers,
    fetchedData: fetchedUsers,
    isError: isErrorUsers,
    error: errorUsers,
    errors: errorsUsers,
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

            handleGetUsers(
                route(data.apiUrlName, {
                    team: data.teamId,
                    search_query: data.search_query,
                    page: data.page,
                })
            );

            // context & send to mutation
            context.commit("setCurrentUsers", {
                fetchedData: fetchedUsers,
                isError: isErrorUsers,
                error: errorUsers,
                errors: errorsUsers,
                isLoading: isLoadingUsers,
                isSuccess: isSuccessUsers,
            });
        },
        // end action
    },
};
