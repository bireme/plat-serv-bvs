if (navigator.userAgent.indexOf('gonative') > -1) {
  if ( PASSWORD_PAGE ) {
    var json = [
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/authentication",
                    "label": "Overview",
                    "subLinks": [],
                    "icon": "fa-home"
                  },
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/mydocuments/control/business",
                    "label": "Favorite Documents",
                    "subLinks": [],
                    "icon": "fa-file"
                  },
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/myprofiledocuments/control/business",
                    "label": "Interest Topics",
                    "subLinks": [],
                    "icon": "fa-folder-open"
                  },
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/mysearches/control/business",
                    "label": "VHL Search History",
                    "subLinks": [],
                    "icon": "fa-search"
                  },
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/mylinks/control/business",
                    "label": "Favorite Links",
                    "subLinks": [],
                    "icon": "fa-link"
                  },
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/orcidworks/control/business",
                    "label": "My Publications",
                    "subLinks": [],
                    "icon": "fa-file-text"
                  },
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/searchresults/control/business",
                    "label": "RSS",
                    "subLinks": [],
                    "icon": "fa-rss"
                  },
                  // {
                  //   "url": MY_VHL_DOMAIN+"/client/controller/tutorial/control/business",
                  //   "label": "Tutorials",
                  //   "subLinks": [],
                  //   "icon": "fa-film"
                  // },
                  {
                    "label": "Settings",
                    "grouping": "[grouping]",
                    "isGrouping": true,
                    "isSubmenu": false,
                    "subLinks": [
                      {
                        "url": PROFILE_PAGE,
                        "label": "Edit Profile",
                        "subLinks": []
                      },
                      {
                        "url": PASSWORD_PAGE,
                        "label": "Change password",
                        "subLinks": []
                      },
                      {
                        "url": "http://feedback.bireme.org/feedback/my-vhl?version=2.10-77&site=servplat&lang"+LANG,
                        "label": "Leave comment",
                        "subLinks": []
                      },
                      {
                        "url": "http://feedback.bireme.org/feedback/my-vhl?version=2.10-77&error=1&site=servplat&lang="+LANG,
                        "label": "Report error",
                        "subLinks": []
                      }
                    ],
                    "icon": "fa-cog"
                  },
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/logout/control/business",
                    "label": "Sign out",
                    "subLinks": [],
                    "icon": "fa-sign-out"
                  }
                ];
  } else {
    var json = [
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/authentication",
                    "label": "Overview",
                    "subLinks": [],
                    "icon": "fa-home"
                  },
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/mydocuments/control/business",
                    "label": "Favorite Documents",
                    "subLinks": [],
                    "icon": "fa-file"
                  },
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/myprofiledocuments/control/business",
                    "label": "Interest Topics",
                    "subLinks": [],
                    "icon": "fa-folder-open"
                  },
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/mysearches/control/business",
                    "label": "VHL Search History",
                    "subLinks": [],
                    "icon": "fa-search"
                  },
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/mylinks/control/business",
                    "label": "Favorite Links",
                    "subLinks": [],
                    "icon": "fa-link"
                  },
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/orcidworks/control/business",
                    "label": "My Publications",
                    "subLinks": [],
                    "icon": "fa-file-text"
                  },
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/searchresults/control/business",
                    "label": "RSS",
                    "subLinks": [],
                    "icon": "fa-rss"
                  },
                  // {
                  //   "url": MY_VHL_DOMAIN+"/client/controller/tutorial/control/business",
                  //   "label": "Tutorials",
                  //   "subLinks": [],
                  //   "icon": "fa-film"
                  // },
                  {
                    "label": "Settings",
                    "grouping": "[grouping]",
                    "isGrouping": true,
                    "isSubmenu": false,
                    "subLinks": [
                      {
                        "url": PROFILE_PAGE,
                        "label": "Edit Profile",
                        "subLinks": []
                      },
                      {
                        "url": "http://feedback.bireme.org/feedback/my-vhl?version=2.10-77&site=servplat&lang"+LANG,
                        "label": "Leave comment",
                        "subLinks": []
                      },
                      {
                        "url": "http://feedback.bireme.org/feedback/my-vhl?version=2.10-77&error=1&site=servplat&lang="+LANG,
                        "label": "Report error",
                        "subLinks": []
                      }
                    ],
                    "icon": "fa-cog"
                  },
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/logout/control/business",
                    "label": "Sign out",
                    "subLinks": [],
                    "icon": "fa-sign-out"
                  }
                ];
  }

  var items = JSON.stringify(json);

  window.location.href='gonative://sidebar/setItems?items=' + encodeURIComponent(items);
}