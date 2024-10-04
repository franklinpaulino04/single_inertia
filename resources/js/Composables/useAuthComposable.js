
export const useAuthComposable = () => {
    const login = async (payload, actions) => {
        try {

            const { data: { success, redirect } } = await axios.post(route('login'), payload);

            if(success){
                window.location.href = redirect;
            }

        }catch (e) {
            if(e.response.data.errors){
                actions.setErrors(e.response.data.errors);
            }
        }
    };

    const logout = async () => {
        try {

            const { data: { success, redirect } } =  await axios.post(route('logout'));

            if(success){
                window.location.href = redirect;
            }

        }catch (e) {
            console.log(e);
        }
    };

    return {
        login,
        logout
    };
}
