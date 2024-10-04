
class AuthService {
    async login(payload) {
        return await axios.post(route('login'), payload);
    }
}

export default new AuthService();
