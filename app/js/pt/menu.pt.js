if (navigator.userAgent.indexOf('gonative') > -1) {
  if ( PASSWORD_PAGE ) {
    var json = [
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/authentication",
                    "label": "Visão Geral",
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
                    "label": "Temas de Interesse",
                    "subLinks": [],
                    "icon": "fa-folder-open"
                  },
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/mysearches/control/business",
                    "label": "Histórico de Buscas na BVS",
                    "subLinks": [],
                    "icon": "fa-search"
                  },
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/mylinks/control/business",
                    "label": "Links Favoritos",
                    "subLinks": [],
                    "icon": "fa-link"
                  },
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/orcidworks/control/business",
                    "label": "Minhas Publicações",
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
                    "label": "Configurações",
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
                        "label": "Alterar senha",
                        "subLinks": []
                      },
                      {
                        "url": TOUR,
                        "label": "Iniciar Tour",
                        "subLinks": []
                      },
                      {
                        "url": "http://feedback.bireme.org/feedback/my-vhl?version=2.10-77&site=servplat&lang"+LANG,
                        "label": "Enviar comentário",
                        "subLinks": []
                      },
                      {
                        "url": "http://feedback.bireme.org/feedback/my-vhl?version=2.10-77&error=1&site=servplat&lang="+LANG,
                        "label": "Comunicar erro",
                        "subLinks": []
                      }
                    ],
                    "icon": "fa-cog"
                  },
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/logout/control/business",
                    "label": "Sair",
                    "subLinks": [],
                    "icon": "fa-sign-out"
                  }
                ];
  } else {
    var json = [
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/authentication",
                    "label": "Visão Geral",
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
                    "label": "Temas de Interesse",
                    "subLinks": [],
                    "icon": "fa-folder-open"
                  },
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/mysearches/control/business",
                    "label": "Histórico de Buscas na BVS",
                    "subLinks": [],
                    "icon": "fa-search"
                  },
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/mylinks/control/business",
                    "label": "Links Favoritos",
                    "subLinks": [],
                    "icon": "fa-link"
                  },
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/orcidworks/control/business",
                    "label": "Minhas Publicações",
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
                    "label": "Configurações",
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
                        "label": "Enviar comentário",
                        "subLinks": []
                      },
                      {
                        "url": "http://feedback.bireme.org/feedback/my-vhl?version=2.10-77&error=1&site=servplat&lang="+LANG,
                        "label": "Comunicar erro",
                        "subLinks": []
                      }
                    ],
                    "icon": "fa-cog"
                  },
                  {
                    "url": MY_VHL_DOMAIN+"/client/controller/logout/control/business",
                    "label": "Sair",
                    "subLinks": [],
                    "icon": "fa-sign-out"
                  }
                ];
  }

  var items = JSON.stringify(json);

  window.location.href='gonative://sidebar/setItems?items=' + encodeURIComponent(items);
}