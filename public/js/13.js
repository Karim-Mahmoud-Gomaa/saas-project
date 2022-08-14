(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[13],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/Menus/Index.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/pages/Menus/Index.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _layouts_App__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../layouts/App */ "./resources/js/layouts/App.vue");
/* harmony import */ var _components_pagination__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../components/pagination */ "./resources/js/components/pagination.vue");
/* harmony import */ var _components_modals_menu_add__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../components/modals/menu/add */ "./resources/js/components/modals/menu/add.vue");
/* harmony import */ var _components_modals_menu_item__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../components/modals/menu/item */ "./resources/js/components/modals/menu/item.vue");
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
    FormModal: _components_modals_menu_add__WEBPACK_IMPORTED_MODULE_2__["default"],
    ItemModal: _components_modals_menu_item__WEBPACK_IMPORTED_MODULE_3__["default"]
  },
  data: function data() {
    return {
      menus: [],
      loader: false
    };
  },
  created: function created() {
    this.fetchData();
  },
  methods: {
    fetchData: function fetchData() {
      var _this = this;

      var num = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 1;
      this.menus = [];
      this.loader = true;
      var data = {
        params: {
          page: num
        }
      };
      axios__WEBPACK_IMPORTED_MODULE_4___default.a.get('menus', data).then(function (_ref) {
        var data = _ref.data;
        _this.menus = data.menu;

        if (!data.menu.length && num != 1) {
          _this.fetchData(1);
        }

        _this.loader = false;
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/Menus/Index.vue?vue&type=template&id=4096535e&":
/*!*********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/pages/Menus/Index.vue?vue&type=template&id=4096535e& ***!
  \*********************************************************************************************************************************************************************************************************/
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
                _c("h4", { staticClass: "mb-0" }, [_vm._v("Menus Table")]),
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
                    }),
                    _vm._v(" "),
                    _c("Item-modal", {
                      ref: "ItemModal",
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
        _vm.menus.length
          ? _c(
              "div",
              { staticClass: "row" },
              _vm._l(_vm.menus, function(menu, index) {
                return _c("div", { staticClass: "col-lg-12" }, [
                  _c("div", { staticClass: "card" }, [
                    _c("div", { staticClass: "card-body" }, [
                      _c("div", { staticClass: "dropdown float-end" }, [
                        _c(
                          "a",
                          {
                            staticClass:
                              "text-body dropdown-toggle font-size-18",
                            attrs: {
                              href: "#",
                              role: "button",
                              "data-bs-toggle": "dropdown",
                              "aria-haspopup": "true"
                            }
                          },
                          [_c("i", { staticClass: "uil uil-ellipsis-v" })]
                        ),
                        _vm._v(" "),
                        _c(
                          "div",
                          { staticClass: "dropdown-menu dropdown-menu-end" },
                          [
                            _c(
                              "a",
                              {
                                staticClass: "dropdown-item dropdownItem",
                                attrs: { href: "javascript:;" },
                                on: {
                                  click: function($event) {
                                    return _vm.$refs.ItemModal.create(menu.id)
                                  }
                                }
                              },
                              [
                                _c("i", { staticClass: "fa-solid fa-plus" }),
                                _vm._v(
                                  " Add Item\n                                    "
                                )
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "a",
                              {
                                staticClass: "dropdown-item dropdownItem",
                                attrs: { href: "javascript:;" },
                                on: {
                                  click: function($event) {
                                    return _vm.$refs.FormModal.edit(menu)
                                  }
                                }
                              },
                              [
                                _c("i", { staticClass: "far fa-edit" }),
                                _vm._v(
                                  " Edit\n                                    "
                                )
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "a",
                              {
                                staticClass: "dropdown-item dropdownItem",
                                attrs: { href: "javascript:;" },
                                on: {
                                  click: function($event) {
                                    return _vm.$refs.FormModal.destroy(menu.id)
                                  }
                                }
                              },
                              [
                                _c("i", { staticClass: "far fa-trash-alt" }),
                                _vm._v(
                                  " Delete\n                                    "
                                )
                              ]
                            )
                          ]
                        )
                      ]),
                      _vm._v(" "),
                      _c("h4", { staticClass: "card-title mb-5" }, [
                        _vm._v(_vm._s(menu.name))
                      ]),
                      _vm._v(" "),
                      menu.items.length
                        ? _c("div", [
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
                                    _c("th", [_vm._v("#")]),
                                    _vm._v(" "),
                                    _c("th", [_vm._v("Title")]),
                                    _vm._v(" "),
                                    _c("th", [_vm._v("Page Name")]),
                                    _vm._v(" "),
                                    _c("th", [_vm._v("Optionis")])
                                  ])
                                ]),
                                _vm._v(" "),
                                _c(
                                  "tbody",
                                  _vm._l(menu.items, function(item, index) {
                                    return _c("tr", [
                                      _c("td", [_vm._v(_vm._s(item.order))]),
                                      _vm._v(" "),
                                      _c("td", [_vm._v(_vm._s(item.title))]),
                                      _vm._v(" "),
                                      _c("td", [
                                        _vm._v(_vm._s(item.page.name))
                                      ]),
                                      _vm._v(" "),
                                      _c("td", [
                                        _c(
                                          "div",
                                          { staticClass: "btn-group" },
                                          [
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
                                                  staticClass:
                                                    "mdi mdi-chevron-down"
                                                }),
                                                _vm._v(
                                                  " More\n                                                    "
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "div",
                                              {
                                                staticClass: "dropdown-menu",
                                                staticStyle: {
                                                  "min-width": "120px"
                                                }
                                              },
                                              [
                                                _c(
                                                  "a",
                                                  {
                                                    staticClass:
                                                      "dropdown-item dropdownItem",
                                                    attrs: {
                                                      href: "javascript:;"
                                                    },
                                                    on: {
                                                      click: function($event) {
                                                        return _vm.$refs.ItemModal.edit(
                                                          item
                                                        )
                                                      }
                                                    }
                                                  },
                                                  [
                                                    _c("i", {
                                                      staticClass: "far fa-edit"
                                                    }),
                                                    _vm._v(
                                                      " Edit\n                                                        "
                                                    )
                                                  ]
                                                ),
                                                _vm._v(" "),
                                                _c(
                                                  "a",
                                                  {
                                                    staticClass:
                                                      "dropdown-item dropdownItem",
                                                    attrs: {
                                                      href: "javascript:;"
                                                    },
                                                    on: {
                                                      click: function($event) {
                                                        return _vm.$refs.ItemModal.destroy(
                                                          item.id,
                                                          menu.id
                                                        )
                                                      }
                                                    }
                                                  },
                                                  [
                                                    _c("i", {
                                                      staticClass:
                                                        "far fa-trash-alt"
                                                    }),
                                                    _vm._v(
                                                      " Delete\n                                                        "
                                                    )
                                                  ]
                                                )
                                              ]
                                            )
                                          ]
                                        )
                                      ])
                                    ])
                                  }),
                                  0
                                )
                              ]
                            )
                          ])
                        : _c("div", { staticClass: "card-body p-0" }, [
                            _c(
                              "p",
                              {
                                staticClass: "card-title-desc m-0",
                                staticStyle: { "text-align": "center" }
                              },
                              [_vm._v("No Items Found")]
                            )
                          ])
                    ])
                  ])
                ])
              }),
              0
            )
          : _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-12" }, [
                _c(
                  "div",
                  { staticClass: "card" },
                  [
                    _vm.loader
                      ? _c("beat-loader", {
                          staticClass: "m-5",
                          attrs: { loading: _vm.loader, color: "#5578eb" }
                        })
                      : _c(
                          "p",
                          {
                            staticClass: "card-title-desc m-5",
                            staticStyle: { "text-align": "center" }
                          },
                          [_vm._v("No Data Found")]
                        )
                  ],
                  1
                )
              ])
            ])
      ])
    ])
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/pages/Menus/Index.vue":
/*!********************************************!*\
  !*** ./resources/js/pages/Menus/Index.vue ***!
  \********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Index_vue_vue_type_template_id_4096535e___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Index.vue?vue&type=template&id=4096535e& */ "./resources/js/pages/Menus/Index.vue?vue&type=template&id=4096535e&");
/* harmony import */ var _Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Index.vue?vue&type=script&lang=js& */ "./resources/js/pages/Menus/Index.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Index_vue_vue_type_template_id_4096535e___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Index_vue_vue_type_template_id_4096535e___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/pages/Menus/Index.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/pages/Menus/Index.vue?vue&type=script&lang=js&":
/*!*********************************************************************!*\
  !*** ./resources/js/pages/Menus/Index.vue?vue&type=script&lang=js& ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Index.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/Menus/Index.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/pages/Menus/Index.vue?vue&type=template&id=4096535e&":
/*!***************************************************************************!*\
  !*** ./resources/js/pages/Menus/Index.vue?vue&type=template&id=4096535e& ***!
  \***************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_template_id_4096535e___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Index.vue?vue&type=template&id=4096535e& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/Menus/Index.vue?vue&type=template&id=4096535e&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_template_id_4096535e___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_template_id_4096535e___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);
//# sourceMappingURL=13.js.map