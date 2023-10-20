const apiVersion = '/';

const apiRoutes = {

    // Auth
    Login: apiVersion + 'login',
    Register: apiVersion + 'register',
    Forgot: apiVersion + 'forgot',
    Reset: apiVersion + 'reset',
    Logout: apiVersion + 'logout',


// profile
    ProfileDetails: apiVersion + 'profile/details',
    ProfileUpdate: apiVersion + 'profile/update',


//     Media
    Media: apiVersion + 'media/upload',
}

export default apiRoutes;
