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
    PasswordUpdate: apiVersion + 'profile/update/password',
    HistoryList: apiVersion + 'profile/history/list',


//    Bookmark
    BookmarkCreate: apiVersion + 'portal/bookmark/create',
    BookmarkUpdate: apiVersion + 'portal/bookmark/update',
    BookmarkList: apiVersion + 'portal/bookmark/list',
    BookmarkDelete: apiVersion + 'portal/bookmark/delete',

//     Media
    Media: apiVersion + 'media/upload',
}

export default apiRoutes;
