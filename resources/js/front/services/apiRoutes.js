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


//    Bookmark
    BookmarkCreate: apiVersion + 'bookmark/create',
    BookmarkUpdate: apiVersion + 'bookmark/update',
    BookmarkList: apiVersion + 'bookmark/list',
    BookmarkDelete: apiVersion + 'bookmark/delete',

//     Media
    Media: apiVersion + 'media/upload',
}

export default apiRoutes;
