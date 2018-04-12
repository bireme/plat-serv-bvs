if (navigator.userAgent.indexOf('gonative') > -1) {
  if ( PASSWORD_PAGE ) {
    var json = [
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/authentication",
                    "label": "Visión General",
                    "subLinks": [],
                    "icon": "fa-home"
                  },
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/mydocuments/control/business",
                    "label": "Documentos Favoritos",
                    "subLinks": [],
                    "icon": "fa-file"
                  },
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/myprofiledocuments/control/business",
                    "label": "Temas de Interés",
                    "subLinks": [],
                    "icon": "fa-folder-open"
                  },
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/mysearches/control/business",
                    "label": "Historial de Búsquedas en BVS",
                    "subLinks": [],
                    "icon": "fa-search"
                  },
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/mylinks/control/business",
                    "label": "Enlaces Favoritos",
                    "subLinks": [],
                    "icon": "fa-link"
                  },
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/orcidworks/control/business",
                    "label": "Mis Publicaciones",
                    "subLinks": [],
                    "icon": "fa-file-text"
                  },
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/searchresults/control/business",
                    "label": "RSS",
                    "subLinks": [],
                    "icon": "fa-rss"
                  },
                  {
                    "label": "Configuraciones",
                    "grouping": "[grouping]",
                    "isGrouping": true,
                    "isSubmenu": false,
                    "subLinks": [
                      {
                        "url": PROFILE_PAGE,
                        "label": "Editar Perfil",
                        "subLinks": []
                      },
                      {
                        "url": PASSWORD_PAGE,
                        "label": "Cambiar contraseña",
                        "subLinks": []
                      },
                      {
                        "url": TOUR,
                        "label": "Iniciar Tour",
                        "subLinks": []
                      },
                      {
                        "url": "http://feedback.bireme.org/feedback/my-vhl?version=2.10-77&site=servplat&lang"+LANG,
                        "label": "Enviar comentario",
                        "subLinks": []
                      },
                      {
                        "url": "http://feedback.bireme.org/feedback/my-vhl?version=2.10-77&error=1&site=servplat&lang="+LANG,
                        "label": "Informar erro",
                        "subLinks": []
                      }
                    ]
                  },
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/logout/control/business",
                    "label": "Salir",
                    "subLinks": [],
                    "icon": "fa-sign-out"
                  }
                ];
  } else {
    var json = [
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/authentication",
                    "label": "Visión General",
                    "subLinks": [],
                    "icon": "fa-home"
                  },
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/mydocuments/control/business",
                    "label": "Documentos Favoritos",
                    "subLinks": [],
                    "icon": "fa-file"
                  },
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/myprofiledocuments/control/business",
                    "label": "Temas de Interés",
                    "subLinks": [],
                    "icon": "fa-folder-open"
                  },
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/mysearches/control/business",
                    "label": "Historial de Búsquedas en BVS",
                    "subLinks": [],
                    "icon": "fa-search"
                  },
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/mylinks/control/business",
                    "label": "Enlaces Favoritos",
                    "subLinks": [],
                    "icon": "fa-link"
                  },
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/orcidworks/control/business",
                    "label": "Mis Publicaciones",
                    "subLinks": [],
                    "icon": "fa-file-text"
                  },
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/searchresults/control/business",
                    "label": "RSS",
                    "subLinks": [],
                    "icon": "fa-rss"
                  },
                  {
                    "label": "Configuraciones",
                    "grouping": "[grouping]",
                    "isGrouping": true,
                    "isSubmenu": false,
                    "subLinks": [
                      {
                        "url": PROFILE_PAGE,
                        "label": "Editar Perfil",
                        "subLinks": []
                      },
                      {
                        "url": TOUR,
                        "label": "Iniciar Tour",
                        "subLinks": []
                      },
                      {
                        "url": "http://feedback.bireme.org/feedback/my-vhl?version=2.10-77&site=servplat&lang"+LANG,
                        "label": "Enviar comentario",
                        "subLinks": []
                      },
                      {
                        "url": "http://feedback.bireme.org/feedback/my-vhl?version=2.10-77&error=1&site=servplat&lang="+LANG,
                        "label": "Informar erro",
                        "subLinks": []
                      }
                    ]
                  },
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/logout/control/business",
                    "label": "Salir",
                    "subLinks": [],
                    "icon": "fa-sign-out"
                  },
                ];
  }

  var items = JSON.stringify(json);

  window.location.href='gonative://sidebar/setItems?items=' + encodeURIComponent(items);
}