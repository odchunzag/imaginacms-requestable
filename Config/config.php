<?php

return [
  'name' => 'Requestable',

  /*
  |--------------------------------------------------------------------------
  | Define all the exportable available
  |--------------------------------------------------------------------------
  */
  'exportable' => [
    "requestables" => [
      'moduleName' => "Requestable",
      'fileName' => "Requests",
      'exportName' => "RequestablesExport",
      'exportFields' => [
        //Choose report Type
        'reportType' => [
          'value' => "detailed",
          'name' => 'isite::reportType',
          'type' => 'select',
          'colClass' => 'col-6',
          'props' => [
            'label' => 'requestable::exports.exportFields.report type',
            'useInput' => false,
            'useChips' => false,
            'multiple' => false,
            'hideDropdownIcon' => true,
            'newValueMode' => 'add-unique',
            'options' => [
              ['label' => 'requestable::exports.exportFields.type.detailed', 'value' => "detailed"],
              ['label' => 'requestable::exports.exportFields.type.statuses', 'value' => "statuses"],
            ]
          ]
        ],
      ]
    ]
  ],

  /*
  |--------------------------------------------------------------------------
  | Same params Readme - Requestable - Only execute by CreateForm Seeder
  |--------------------------------------------------------------------------
  */
  "requestable-leads" => [

    //Required: this is the identificator of the request, must be unique with respect to other requestable types
    "type" => "leads",

    // Title can be trantaled or not, the language take the config app.locale
    "title" => "requestable::categories.leads.title",

    // Optional: This columns has true by default
    "internal" => false,


    //Optional: if the useDefaultStatuses is true, statuses is ignored
    "statuses" => [
      1 => [
        "id" => 1,
        "title" => "requestable::statuses.leads.new", // Title can be trantaled or not, the language take the config app.locale
        "type" => 0, //In Progress
        "color" => "#bf5454",
        "default" => true
      ],
      2 => [
        "id" => 2,
        "title" => "requestable::statuses.leads.contacted",
        "type" => 0, //In Progress
        "color" => "#6d2080"
      ],
      3 => [
        "id" => 3,
        "title" => "requestable::statuses.leads.commercial proposal",
        "type" => 0, //In Progress
        "color" => "#38d3b2"
      ],
      4 => [
        "id" => 4,
        "title" => "requestable::statuses.leads.in progress",
        "type" => 0, //In Progress
        "color" => "#ec7f17"
      ],
      5 => [
        "id" => 5,
        "title" => "requestable::statuses.leads.successful",
        "type" => 2, //Success
        "color" => "#2cc03d",
        "final" => true
      ],
      6 => [
        "id" => 6,
        "title" => "requestable::statuses.leads.lost",
        "type" => 1, //Failed
        "color" => "#e34b4b",
        "final" => true
      ],
    ]

  ],

  /*
  |--------------------------------------------------------------------------
  | Categories Rule to Seeder
  |--------------------------------------------------------------------------
  */
  "categories-rules" => [
    //Parent
    0 => [
      'systemName' => 'client-communications',
      'en' => ['title' => 'Client Communications'],
      'es' => ['title' => 'Comunicacion con el Cliente'],
    ],
    //Child Category - client-communications
    1 => [
      'systemName' => 'send-email',
      'parentSystemName' => 'client-communications', //from parent
      'en' => ['title' => 'Send Email'],
      'es' => ['title' => 'Enviar email'],
      'options' => ['filterFormFieldType' => 'email'],//type field iform
      'formFields' => [
        'from' => [
          'value' => null,
          'name' => 'from',
          'type' => 'select',
          'loadOptions' => [
            'apiRoute' => 'apiRoutes.quser.users',
            'select' => ['label' => 'email', 'value' => 'email', 'id' => 'email']
          ],
          'props' => [
            'label' => 'requestable::common.formFields.from',
            'multiple' => false,
            'clearable' => true,
          ],
        ],
        'subject' => [
          'value' => null,
          'name' => 'subject',
          'type' => 'expression',
          'isTranslatable' => true,
          'loadOptions' => [
            'apiRoute' => 'apiRoutes.qrequestable.categoriesFormFields',
            'select' => ['label' => 'label', 'id' => 'value'],
            'parametersUrl' => [
              'categoryId' => 1
            ]
          ],
          'props' => [
            'label' => 'requestable::common.formFields.subject'
          ]
        ],
        'message' => [
          'value' => null,
          'name' => 'message',
          'type' => 'expression',
          'isTranslatable' => true,
          'loadOptions' => [
            'apiRoute' => 'apiRoutes.qrequestable.categoriesFormFields',
            'select' => ['label' => 'label', 'id' => 'value'],
            'parametersUrl' => [
              'categoryId' => 1
            ]
          ],
          'props' => [
            'label' => 'requestable::common.formFields.message',
            'type' => 'textarea',
            'rows' => 3,
          ]
        ],
      ]
    ],
    //Child Category - client-communications
    2 => [
      'systemName' => 'send-sms',
      'parentSystemName' => 'client-communications', //from parent
      'en' => ['title' => 'Send SMS'],
      'es' => ['title' => 'Enviar sms'],
      'status' => 0,
      'options' => ['filterFormFieldType' => 'phone'],//type field iform
      'formFields' => [
        'message' => [
          'value' => null,
          'name' => 'message',
          'type' => 'expression',
          'isTranslatable' => true,
          'loadOptions' => [
            'apiRoute' => 'apiRoutes.qrequestable.categoriesFormFields',
            'select' => ['label' => 'label', 'id' => 'value'],
            'parametersUrl' => [
              'categoryId' => 1
            ]
          ],
          'props' => [
            'label' => 'requestable::common.formFields.message',
            'type' => 'textarea',
            'rows' => 3,
          ]
        ]
      ]
    ],
    //Child Category - client-communications
    3 => [
      'systemName' => 'send-telegram',
      'parentSystemName' => 'client-communications', //from parent
      'en' => ['title' => 'Send Telegram'],
      'es' => ['title' => 'Enviar Telegram'],
      'status' => 0,
      'options' => ['filterFormFieldType' => 'phone'],//type field iform
      'formFields' => [
        'message' => [
          'value' => null,
          'name' => 'message',
          'type' => 'expression',
          'loadOptions' => [
            'apiRoute' => 'apiRoutes.qrequestable.categoriesFormFields',
            'select' => ['label' => 'label', 'id' => 'value'],
            'parametersUrl' => [
              'categoryId' => 1
            ]
          ],
          'isTranslatable' => true,
          'props' => [
            'label' => 'requestable::common.formFields.message',
            'type' => 'textarea',
            'rows' => 3,
          ]
        ]
      ]
    ],
    //Child Category - client-communications
    4 => [
      'systemName' => 'send-whatsapp',
      'parentSystemName' => 'client-communications', //from parent
      'en' => ['title' => 'Send Whatsapp'],
      'es' => ['title' => 'Enviar Whatsapp'],
      'options' => ['filterFormFieldType' => 'phone'],//type field iform
      'formFields' => [
        'message' => [
          'value' => null,
          'name' => 'message',
          'type' => 'expression',
          'loadOptions' => [
            'apiRoute' => 'apiRoutes.qrequestable.categoriesFormFields',
            'select' => ['label' => 'label', 'id' => 'value'],
            'parametersUrl' => [
              'categoryId' => 1
            ]
          ],
          'isTranslatable' => true,
          'props' => [
            'label' => 'requestable::common.formFields.message',
            'type' => 'textarea',
            'rows' => 3,
          ]
        ]
      ]
    ],

  ],

  /*
  |--------------------------------------------------------------------------
  | Documentation
  |--------------------------------------------------------------------------
  */
  'documentation' => [
    'requestables' => "requestable::cms.documentation.requestables",
    'categories' => "requestable::cms.documentation.categories",
    'statuses' => "requestable::cms.documentation.statuses",
  ],

  /*
  |--------------------------------------------------------------------------
  | Configuration to comment types by entity
  |--------------------------------------------------------------------------
  */
  'commentableConfig' => [

    'requestable' => [

      'notification' => [
        'type' => 'notification',
        'icon'  => 'fa fa-bell',
        'color' => '#31ccec' //blue
      ],
      'document' => [
        'type' => 'document',
        'icon'  => 'fa fa-book',
        'color' => '#bf5454' //red
      ],
      'statusChanged' => [
        'type' => 'statusChanged',
        'icon'  => 'fa fa-info-circle',
        'color' => '#fae100' //yellow
      ]

    ]

  ]

];
