if (navigator.userAgent.indexOf('gonative') > -1) {
  var json = [
                {
                  "label": "Idioma",
                  "grouping": "[grouping]",
                  "isGrouping": true,
                  "isSubmenu": false,
                  "subLinks": [
                    {
                      "label": "Português",
                      "url": MY_VHL_DOMAIN+"/client/controller/authentication/?lang=pt"
                    },
                    {
                      "url": MY_VHL_DOMAIN+"/client/controller/authentication/?lang=es",
                      "label": "Español",
                      "subLinks": []
                    },
                    {
                      "url": MY_VHL_DOMAIN+"/client/controller/authentication/?lang=en",
                      "label": "English",
                      "subLinks": []
                    }
                  ]
                },
                // {
                //   "url": MY_VHL_DOMAIN+"/client/controller/authentication/task/describe",
                //   "label": "Saiba mais",
                //   "subLinks": []
                // }
              ];

  var items = JSON.stringify(json);

  window.location.href='gonative://sidebar/setItems?items=' + encodeURIComponent(items);
}