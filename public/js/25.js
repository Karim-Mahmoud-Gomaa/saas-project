(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[25],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/modals/faq/add.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/modals/faq/add.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vform__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vform */ "./node_modules/vform/dist/vform.common.js");
/* harmony import */ var vform__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(vform__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var vue_select_dist_vue_select_css__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! vue-select/dist/vue-select.css */ "./node_modules/vue-select/dist/vue-select.css");
/* harmony import */ var vue_select_dist_vue_select_css__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(vue_select_dist_vue_select_css__WEBPACK_IMPORTED_MODULE_2__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//



/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    HasError: vform__WEBPACK_IMPORTED_MODULE_0__["HasError"]
  },
  props: ['fetchData'],
  data: function data() {
    return {
      services: [],
      form: new vform__WEBPACK_IMPORTED_MODULE_0__["Form"]({
        id: null,
        service_id: null,
        lang: 'en',
        question: null,
        answer: null
      })
    };
  },
  methods: {
    create: function create() {
      this.form.reset();
      this.getInfo();
    },
    store: function store() {
      var _this = this;

      this.form.post("faq").then(function (_ref) {
        var data = _ref.data;

        _this.fetchData();

        $('#faqAddModal').modal('hide');
      });
    },
    edit: function edit(faq, lang) {
      this.form.reset();
      this.services = [];
      this.form.lang = lang;
      this.form.id = faq.id;
      this.form.question = faq.question ? faq.question[lang] : null;
      this.form.answer = faq.answer ? faq.answer[lang] : null;
      $('#faqAddModal').modal('show');
    },
    update: function update() {
      var _this2 = this;

      this.form.put("faq/" + this.form.id).then(function (_ref2) {
        var data = _ref2.data;

        _this2.fetchData();

        $('#faqAddModal').modal('hide');
      });
    },
    getInfo: function getInfo() {
      var _this3 = this;

      axios__WEBPACK_IMPORTED_MODULE_1___default.a.get("services", {
        params: {
          paginate: 0
        }
      }).then(function (_ref3) {
        var data = _ref3.data;
        _this3.services = [];

        if (data.success.services.length) {
          var that = _this3;
          data.success.services.forEach(function (value) {
            that.services.push({
              id: value.id,
              name: value.name['en']
            });
          });
          $('#faqAddModal').modal('show');
        } else {
          _this3.$swal.fire({
            icon: 'warning',
            title: "Sorry!",
            text: 'You Most Create Service First'
          });
        }
      })["catch"](function (error) {
        console.log("Error......");
      });
    },
    destroy: function destroy(id) {
      var _this4 = this;

      this.$swal.fire({
        title: 'warning',
        text: "Are you sure you want to remove this row?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: "cancel",
        confirmButtonText: "Yes,Delete It!"
      }).then(function (result) {
        if (result.value) {
          axios__WEBPACK_IMPORTED_MODULE_1___default.a["delete"]('faq/' + id).then(function (response) {
            _this4.$swal.fire(response.data.message, response.data.success + '!', 'success');

            _this4.fetchData();
          })["catch"](function () {
            _this4.$swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Something went wrong!',
              footer: '<a href>Why do I have this issue?</a>'
            });
          });
        }
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/Services/FAQ.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/pages/Services/FAQ.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _layouts_App__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../layouts/App */ "./resources/js/layouts/App.vue");
/* harmony import */ var _components_pagination__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../components/pagination */ "./resources/js/components/pagination.vue");
/* harmony import */ var _components_modals_faq_add__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../components/modals/faq/add */ "./resources/js/components/modals/faq/add.vue");
/* harmony import */ var _components_filters_features__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../components/filters/features */ "./resources/js/components/filters/features.vue");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_4__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//




 ///////////////////////////////

/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    LayoutDefault: _layouts_App__WEBPACK_IMPORTED_MODULE_0__["default"],
    PaginationNav: _components_pagination__WEBPACK_IMPORTED_MODULE_1__["default"],
    FormModal: _components_modals_faq_add__WEBPACK_IMPORTED_MODULE_2__["default"],
    FormFilter: _components_filters_features__WEBPACK_IMPORTED_MODULE_3__["default"]
  },
  data: function data() {
    return {
      faqs: null,
      locales: null,
      loader: false
    };
  },
  created: function created() {
    this.fetchData();
    this.getLocales();
  },
  methods: {
    fetchData: function fetchData() {
      var _this = this;

      var num = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 1;
      this.faqs = null;
      this.loader = true;
      var data = {
        params: {
          page: num
        }
      };
      axios__WEBPACK_IMPORTED_MODULE_4___default.a.get('faq', data).then(function (_ref) {
        var data = _ref.data;
        _this.faqs = data.success.faq;

        if (!data.success.faq.data.length && num != 1) {
          _this.fetchData(1);
        }

        _this.loader = false;
      });
    },
    getLocales: function getLocales() {
      var _this2 = this;

      axios__WEBPACK_IMPORTED_MODULE_4___default.a.get('locales').then(function (_ref2) {
        var data = _ref2.data;
        _this2.locales = data.success;
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/modals/faq/add.vue?vue&type=template&id=ee59dfec&":
/*!*****************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/modals/faq/add.vue?vue&type=template&id=ee59dfec& ***!
  \*****************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    {
      staticClass: "modal fade",
      attrs: {
        id: "faqAddModal",
        "data-bs-backdrop": "static",
        "data-bs-keyboard": "false",
        tabindex: "-1",
        role: "dialog",
        "aria-labelledby": "staticBackdropLabel",
        "aria-hidden": "true"
      }
    },
    [
      _c(
        "div",
        {
          staticClass: "modal-dialog modal-dialog-centered",
          attrs: { role: "document" }
        },
        [
          _c(
            "form",
            {
              staticClass: "modal-content",
              on: {
                submit: function($event) {
                  $event.preventDefault()
                  _vm.form.id ? _vm.update() : _vm.store()
                }
              }
            },
            [
              _c("div", { staticClass: "modal-header" }, [
                _c(
                  "h5",
                  {
                    staticClass: "modal-title",
                    attrs: { id: "formModalLabel" }
                  },
                  [
                    _vm._v(
                      _vm._s(_vm.form.id ? "Update" : "Create New") + " FAQ"
                    )
                  ]
                ),
                _vm._v(" "),
                _c("button", {
                  staticClass: "btn-close",
                  attrs: {
                    type: "button",
                    "data-bs-dismiss": "modal",
                    "aria-label": "Close"
                  }
                })
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "modal-body row" }, [
                _vm.services && _vm.services.length
                  ? _c(
                      "div",
                      { staticClass: "col-12 mt-3" },
                      [
                        _c("label", [_vm._v("Service")]),
                        _vm._v(" "),
                        _c("v-select", {
                          staticClass: "vselect",
                          staticStyle: { width: "100%" },
                          attrs: {
                            label: "name",
                            options: _vm.services,
                            reduce: function(val) {
                              return val.id
                            }
                          },
                          model: {
                            value: _vm.form.service_id,
                            callback: function($$v) {
                              _vm.$set(_vm.form, "service_id", $$v)
                            },
                            expression: "form.service_id"
                          }
                        })
                      ],
                      1
                    )
                  : _vm._e(),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "col-12 mt-3" },
                  [
                    _c("label", [_vm._v("Question")]),
                    _vm._v(" "),
                    _c("textarea", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.form.question,
                          expression: "form.question"
                        }
                      ],
                      staticClass: "form-control",
                      class: { "is-invalid": _vm.form.errors.has("question") },
                      attrs: {
                        dir: _vm.form.lang == "ar" ? "rtl" : "ltr",
                        rows: "2"
                      },
                      domProps: { value: _vm.form.question },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(_vm.form, "question", $event.target.value)
                        }
                      }
                    }),
                    _vm._v(" "),
                    _c("has-error", {
                      attrs: { form: _vm.form, field: "question" }
                    })
                  ],
                  1
                ),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "col-12 mt-3" },
                  [
                    _c("label", [_vm._v("Answer")]),
                    _vm._v(" "),
                    _c("textarea", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.form.answer,
                          expression: "form.answer"
                        }
                      ],
                      staticClass: "form-control",
                      class: { "is-invalid": _vm.form.errors.has("answer") },
                      attrs: {
                        dir: _vm.form.lang == "ar" ? "rtl" : "ltr",
                        rows: "2"
                      },
                      domProps: { value: _vm.form.answer },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(_vm.form, "answer", $event.target.value)
                        }
                      }
                    }),
                    _vm._v(" "),
                    _c("has-error", {
                      attrs: { form: _vm.form, field: "answer" }
                    })
                  ],
                  1
                )
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "modal-footer" }, [
                _c(
                  "button",
                  {
                    staticClass: "btn btn-light",
                    attrs: { type: "button", "data-bs-dismiss": "modal" }
                  },
                  [_vm._v("Close")]
                ),
                _vm._v(" "),
                _vm.form.id
                  ? _c(
                      "button",
                      {
                        staticClass: "btn btn-primary",
                        attrs: { type: "submit" }
                      },
                      [_vm._v("Update")]
                    )
                  : _c(
                      "button",
                      {
                        staticClass: "btn btn-primary",
                        attrs: { type: "submit" }
                      },
                      [_vm._v("Save")]
                    )
              ])
            ]
          )
        ]
      )
    ]
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/Services/FAQ.vue?vue&type=template&id=4a234564&":
/*!**********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/pages/Services/FAQ.vue?vue&type=template&id=4a234564& ***!
  \**********************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("layout-default", [
    _c("div", { staticClass: "page-content" }, [
      _c("div", { staticClass: "container-fluid" }, [
        _c("div", { staticClass: "row" }, [
          _c("div", { staticClass: "col-12" }, [
            _c(
              "div",
              {
                staticClass:
                  "page-title-box d-flex align-items-center justify-content-between"
              },
              [
                _c("h4", { staticClass: "mb-0" }, [_vm._v("Packages Table")]),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "page-title-right" },
                  [
                    _c(
                      "button",
                      {
                        staticClass: "btn btn-success waves-effect waves-light",
                        attrs: { type: "button" },
                        on: {
                          click: function($event) {
                            return _vm.$refs.FormModal.create()
                          }
                        }
                      },
                      [_vm._v("Add New +")]
                    ),
                    _vm._v(" "),
                    _c("form-modal", {
                      ref: "FormModal",
                      attrs: { fetchData: _vm.fetchData }
                    })
                  ],
                  1
                )
              ]
            )
          ])
        ]),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "row" },
          [
            _c("FormFilter", {
              ref: "FormFilter",
              attrs: { fetchData: _vm.fetchData }
            }),
            _vm._v(" "),
            _c("div", { staticClass: "col-12" }, [
              _c("div", { staticClass: "card" }, [
                _vm.faqs && _vm.faqs.data.length && _vm.locales
                  ? _c(
                      "div",
                      { staticClass: "card-body" },
                      [
                        _c(
                          "table",
                          {
                            staticClass:
                              "table table-bordered dt-responsive nowrap",
                            staticStyle: {
                              "border-collapse": "collapse",
                              "border-spacing": "0",
                              width: "100%"
                            },
                            attrs: { id: "datatable" }
                          },
                          [
                            _c("thead", [
                              _c("tr", [
                                _c("th", [_vm._v("FAQ")]),
                                _vm._v(" "),
                                _c("th", [_vm._v("Service")]),
                                _vm._v(" "),
                                _c("th", [_vm._v("Languages")]),
                                _vm._v(" "),
                                _c("th", [_vm._v("Optionis")])
                              ])
                            ]),
                            _vm._v(" "),
                            _c(
                              "tbody",
                              _vm._l(_vm.faqs.data, function(faq, index) {
                                return _c("tr", [
                                  _c("td", [
                                    _vm._v(_vm._s(faq.question["en"]) + "?")
                                  ]),
                                  _vm._v(" "),
                                  _c("td", [
                                    _vm._v(_vm._s(faq.service.name["en"]))
                                  ]),
                                  _vm._v(" "),
                                  _c(
                                    "td",
                                    [
                                      _vm._l(_vm.locales, function(
                                        lang,
                                        index
                                      ) {
                                        return [
                                          faq.question &&
                                          faq.question[index] &&
                                          faq.answer &&
                                          faq.answer[index]
                                            ? _c(
                                                "div",
                                                {
                                                  staticClass:
                                                    "btn btn-sm btn-info btn-soft-info waves-effect waves-light m-1",
                                                  on: {
                                                    click: function($event) {
                                                      return _vm.$refs.FormModal.edit(
                                                        faq,
                                                        index
                                                      )
                                                    }
                                                  }
                                                },
                                                [
                                                  _vm._v(
                                                    "\n                                                    " +
                                                      _vm._s(lang.name) +
                                                      " "
                                                  ),
                                                  _c("i", {
                                                    staticClass:
                                                      "fa-regular fa-eye"
                                                  })
                                                ]
                                              )
                                            : _c(
                                                "div",
                                                {
                                                  staticClass:
                                                    "btn btn-sm btn-success btn-soft-success waves-effect waves-light m-1",
                                                  on: {
                                                    click: function($event) {
                                                      return _vm.$refs.FormModal.edit(
                                                        faq,
                                                        index
                                                      )
                                                    }
                                                  }
                                                },
                                                [
                                                  _vm._v(
                                                    "\n                                                    " +
                                                      _vm._s(lang.name) +
                                                      " "
                                                  ),
                                                  _c("i", {
                                                    staticClass:
                                                      "fa-solid fa-plus"
                                                  })
                                                ]
                                              )
                                        ]
                                      })
                                    ],
                                    2
                                  ),
                                  _vm._v(" "),
                                  _c("td", [
                                    _c("div", { staticClass: "btn-group" }, [
                                      _c(
                                        "button",
                                        {
                                          staticClass:
                                            "btn btn-light dropdown-toggle",
                                          attrs: {
                                            type: "button",
                                            "data-bs-toggle": "dropdown",
                                            "aria-haspopup": "true",
                                            "aria-expanded": "false"
                                          }
                                        },
                                        [
                                          _c("i", {
                                            staticClass: "mdi mdi-chevron-down"
                                          }),
                                          _vm._v(
                                            " More\n                                                "
                                          )
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "div",
                                        {
                                          staticClass: "dropdown-menu",
                                          staticStyle: { "min-width": "120px" }
                                        },
                                        [
                                          _c(
                                            "a",
                                            {
                                              staticClass:
                                                "dropdown-item dropdownItem",
                                              attrs: { href: "javascript:;" },
                                              on: {
                                                click: function($event) {
                                                  return _vm.$refs.FormModal.destroy(
                                                    faq.id
                                                  )
                                                }
                                              }
                                            },
                                            [
                                              _c("i", {
                                                staticClass: "far fa-trash-alt"
                                              }),
                                              _vm._v(
                                                " Delete\n                                                    "
                                              )
                                            ]
                                          )
                                        ]
                                      )
                                    ])
                                  ])
                                ])
                              }),
                              0
                            )
                          ]
                        ),
                        _vm._v(" "),
                        _vm.faqs.last_page > 1
                          ? _c("pagination-nav", {
                              attrs: {
                                faqSize: _vm.faqs.last_page,
                                currentPackage: _vm.faqs.current_page,
                                GoToPackage: _vm.fetchData,
                                loading: _vm.loader
                              }
                            })
                          : _vm._e()
                      ],
                      1
                    )
                  : _c(
                      "div",
                      { staticClass: "card-body" },
                      [
                        _vm.loader
                          ? _c("beat-loader", {
                              attrs: { loading: _vm.loader, color: "#5578eb" }
                            })
                          : _c(
                              "p",
                              {
                                staticClass: "card-title-desc",
                                staticStyle: { "text-align": "center" }
                              },
                              [_vm._v("No Data Found")]
                            )
                      ],
                      1
                    )
              ])
            ])
          ],
          1
        )
      ])
    ])
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/modals/faq/add.vue":
/*!****************************************************!*\
  !*** ./resources/js/components/modals/faq/add.vue ***!
  \****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _add_vue_vue_type_template_id_ee59dfec___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./add.vue?vue&type=template&id=ee59dfec& */ "./resources/js/components/modals/faq/add.vue?vue&type=template&id=ee59dfec&");
/* harmony import */ var _add_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./add.vue?vue&type=script&lang=js& */ "./resources/js/components/modals/faq/add.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _add_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _add_vue_vue_type_template_id_ee59dfec___WEBPACK_IMPORTED_MODULE_0__["render"],
  _add_vue_vue_type_template_id_ee59dfec___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/modals/faq/add.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/modals/faq/add.vue?vue&type=script&lang=js&":
/*!*****************************************************************************!*\
  !*** ./resources/js/components/modals/faq/add.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./add.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/modals/faq/add.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/modals/faq/add.vue?vue&type=template&id=ee59dfec&":
/*!***********************************************************************************!*\
  !*** ./resources/js/components/modals/faq/add.vue?vue&type=template&id=ee59dfec& ***!
  \***********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_template_id_ee59dfec___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./add.vue?vue&type=template&id=ee59dfec& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/modals/faq/add.vue?vue&type=template&id=ee59dfec&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_template_id_ee59dfec___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_template_id_ee59dfec___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/pages/Services/FAQ.vue":
/*!*********************************************!*\
  !*** ./resources/js/pages/Services/FAQ.vue ***!
  \*********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _FAQ_vue_vue_type_template_id_4a234564___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./FAQ.vue?vue&type=template&id=4a234564& */ "./resources/js/pages/Services/FAQ.vue?vue&type=template&id=4a234564&");
/* harmony import */ var _FAQ_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./FAQ.vue?vue&type=script&lang=js& */ "./resources/js/pages/Services/FAQ.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _FAQ_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _FAQ_vue_vue_type_template_id_4a234564___WEBPACK_IMPORTED_MODULE_0__["render"],
  _FAQ_vue_vue_type_template_id_4a234564___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/pages/Services/FAQ.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/pages/Services/FAQ.vue?vue&type=script&lang=js&":
/*!**********************************************************************!*\
  !*** ./resources/js/pages/Services/FAQ.vue?vue&type=script&lang=js& ***!
  \**********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_FAQ_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./FAQ.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/Services/FAQ.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_FAQ_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/pages/Services/FAQ.vue?vue&type=template&id=4a234564&":
/*!****************************************************************************!*\
  !*** ./resources/js/pages/Services/FAQ.vue?vue&type=template&id=4a234564& ***!
  \****************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_FAQ_vue_vue_type_template_id_4a234564___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./FAQ.vue?vue&type=template&id=4a234564& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/Services/FAQ.vue?vue&type=template&id=4a234564&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_FAQ_vue_vue_type_template_id_4a234564___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_FAQ_vue_vue_type_template_id_4a234564___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);
//# sourceMappingURL=25.js.map