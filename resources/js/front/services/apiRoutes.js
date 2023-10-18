const apiVersion = '/';

const apiRoutes = {

    // Auth
    Login: apiVersion + 'login',
    Register: apiVersion + 'register',
    Forgot: apiVersion + 'forgot',
    Reset: apiVersion + 'reset',
    Logout: apiVersion + 'logout',


// profile
    ProfileDetails: apiVersion + 'profile/details'
}

export default apiRoutes;
