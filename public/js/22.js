(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[22],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/Users/Show.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/pages/Users/Show.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _layouts_App__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../layouts/App */ "./resources/js/layouts/App.vue");
/* harmony import */ var _components_pagination__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../components/pagination */ "./resources/js/components/pagination.vue");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var vform__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! vform */ "./node_modules/vform/dist/vform.common.js");
/* harmony import */ var vform__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(vform__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _components_modals_user_add__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../components/modals/user/add */ "./resources/js/components/modals/user/add.vue");
/* harmony import */ var vuejs_datepicker__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! vuejs-datepicker */ "./node_modules/vuejs-datepicker/dist/vuejs-datepicker.esm.js");
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






/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    LayoutDefault: _layouts_App__WEBPACK_IMPORTED_MODULE_0__["default"],
    PaginationNav: _components_pagination__WEBPACK_IMPORTED_MODULE_1__["default"],
    HasError: vform__WEBPACK_IMPORTED_MODULE_3__["HasError"],
    Datepicker: vuejs_datepicker__WEBPACK_IMPORTED_MODULE_5__["default"],
    FormModal: _components_modals_user_add__WEBPACK_IMPORTED_MODULE_4__["default"]
  },
  data: function data() {
    return {
      user: null,
      roles: null,
      ischanged: false,
      user_roles: []
    };
  },
  created: function created() {
    this.fetchData();
  },
  methods: {
    fetchData: function fetchData() {
      var _this = this;

      axios__WEBPACK_IMPORTED_MODULE_2___default.a.get('users/' + this.$route.params.user_id).then(function (_ref) {
        var data = _ref.data;
        _this.user = data.user;
        var that = _this;
        data.user.roles.forEach(function (value) {
          that.user_roles.push(value.id);
        });
      });
      axios__WEBPACK_IMPORTED_MODULE_2___default.a.get('roles').then(function (_ref2) {
        var data = _ref2.data;
        _this.roles = data.roles.data;
      });
    },
    saveRoles: function saveRoles() {
      var _this2 = this;

      this.ischanged = false, axios__WEBPACK_IMPORTED_MODULE_2___default.a.put('/users/' + this.$route.params.user_id + '/roles', {
        roles: this.user_roles
      }).then(function (_ref3) {
        var data = _ref3.data;

        _this2.$swal.fire("Done!", "User Roles Successfully Updated", 'success');
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/Users/Show.vue?vue&type=template&id=790931e6&":
/*!********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/pages/Users/Show.vue?vue&type=template&id=790931e6& ***!
  \********************************************************************************************************************************************************************************************************/
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
                _c("h4", { staticClass: "mb-0" }, [_vm._v("User Profile")]),
                _vm._v(" "),
                _c("form-modal", { ref: "FormModal" }),
                _vm._v(" "),
                _vm.user
                  ? _c("div", { staticClass: "page-title-right" }, [
                      _c(
                        "a",
                        {
                          staticClass:
                            "btn btn-success w-md waves-effect waves-light",
                          attrs: { href: "javascript:;" },
                          on: {
                            click: function($event) {
                              return _vm.$refs.FormModal.edit(_vm.user)
                            }
                          }
                        },
                        [
                          _c("i", { staticClass: "far fa-edit" }),
                          _vm._v(" Update")
                        ]
                      )
                    ])
                  : _vm._e()
              ],
              1
            )
          ])
        ]),
        _vm._v(" "),
        _vm.user
          ? _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-lg-12" }, [
                _c("div", { staticClass: "card mb-5" }, [
                  _c(
                    "div",
                    {
                      staticClass: "card-body",
                      staticStyle: { margin: "20px", "min-height": "600px" }
                    },
                    [
                      _c("div", { staticClass: "invoice-title row" }, [
                        _c("div", { staticClass: "col-md-4" }, [
                          _c("h4", { staticClass: "font-size-16" }, [
                            _c("b", [_vm._v("Name /")]),
                            _vm._v(
                              " " +
                                _vm._s(_vm.user.name) +
                                "\n                                  "
                            )
                          ])
                        ]),
                        _vm._v(" "),
                        _c("div", { staticClass: "col-md-4" }, [
                          _c("h4", { staticClass: "font-size-16" }, [
                            _c("b", [_vm._v("Email /")]),
                            _vm._v(
                              " " +
                                _vm._s(_vm.user.email) +
                                "\n                                  "
                            )
                          ])
                        ]),
                        _vm._v(" "),
                        _c("div", { staticClass: "col-md-4" }, [
                          _c("h4", { staticClass: "font-size-16" }, [
                            _c("b", [_vm._v("Created At /")]),
                            _vm._v(
                              " " +
                                _vm._s(
                                  _vm._f("moment")(
                                    _vm.user.created_at,
                                    "DD/MM/YYYY"
                                  )
                                ) +
                                "\n                                  "
                            )
                          ])
                        ]),
                        _vm._v(" "),
                        _vm.roles
                          ? _c("div", { staticClass: "col-md-12" }, [
                              _c("hr", { staticClass: "mt-4 mb-4" }),
                              _vm._v(" "),
                              _c("h4", { staticClass: "font-size-16 mb-5" }, [
                                _c("b", [_vm._v("Roles")]),
                                _vm._v(" "),
                                _vm.ischanged
                                  ? _c(
                                      "a",
                                      {
                                        staticClass:
                                          "btn btn-info w-md waves-effect waves-light float-end",
                                        attrs: { href: "javascript:;" },
                                        on: {
                                          click: function($event) {
                                            return _vm.saveRoles()
                                          }
                                        }
                                      },
                                      [_vm._v("Save Changes")]
                                    )
                                  : _vm._e()
                              ]),
                              _vm._v(" "),
                              _c(
                                "h4",
                                { staticClass: "row font-size-16 m-2" },
                                _vm._l(_vm.roles, function(role, index) {
                                  return _c(
                                    "div",
                                    { staticClass: "form-check col-md-3 mb-4" },
                                    [
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: _vm.user_roles,
                                            expression: "user_roles"
                                          }
                                        ],
                                        staticClass: "form-check-input",
                                        attrs: {
                                          type: "checkbox",
                                          id: "check" + index
                                        },
                                        domProps: {
                                          value: role.id,
                                          checked: Array.isArray(_vm.user_roles)
                                            ? _vm._i(_vm.user_roles, role.id) >
                                              -1
                                            : _vm.user_roles
                                        },
                                        on: {
                                          click: function($event) {
                                            _vm.ischanged = true
                                          },
                                          change: function($event) {
                                            var $$a = _vm.user_roles,
                                              $$el = $event.target,
                                              $$c = $$el.checked ? true : false
                                            if (Array.isArray($$a)) {
                                              var $$v = role.id,
                                                $$i = _vm._i($$a, $$v)
                                              if ($$el.checked) {
                                                $$i < 0 &&
                                                  (_vm.user_roles = $$a.concat([
                                                    $$v
                                                  ]))
                                              } else {
                                                $$i > -1 &&
                                                  (_vm.user_roles = $$a
                                                    .slice(0, $$i)
                                                    .concat($$a.slice($$i + 1)))
                                              }
                                            } else {
                                              _vm.user_roles = $$c
                                            }
                                          }
                                        }
                                      }),
                                      _vm._v(" "),
                                      _c(
                                        "label",
                                        {
                                          staticClass: "form-check-label",
                                          attrs: { for: "check" + index }
                                        },
                                        [_vm._v(_vm._s(role.name))]
                                      )
                                    ]
                                  )
                                }),
                                0
                              )
                            ])
                          : _vm._e()
                      ])
                    ]
                  )
                ])
              ])
            ])
          : _vm._e()
      ])
    ])
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/pages/Users/Show.vue":
/*!*******************************************!*\
  !*** ./resources/js/pages/Users/Show.vue ***!
  \*******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Show_vue_vue_type_template_id_790931e6___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Show.vue?vue&type=template&id=790931e6& */ "./resources/js/pages/Users/Show.vue?vue&type=template&id=790931e6&");
/* harmony import */ var _Show_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Show.vue?vue&type=script&lang=js& */ "./resources/js/pages/Users/Show.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Show_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Show_vue_vue_type_template_id_790931e6___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Show_vue_vue_type_template_id_790931e6___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/pages/Users/Show.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/pages/Users/Show.vue?vue&type=script&lang=js&":
/*!********************************************************************!*\
  !*** ./resources/js/pages/Users/Show.vue?vue&type=script&lang=js& ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Show_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Show.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/Users/Show.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Show_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/pages/Users/Show.vue?vue&type=template&id=790931e6&":
/*!**************************************************************************!*\
  !*** ./resources/js/pages/Users/Show.vue?vue&type=template&id=790931e6& ***!
  \**************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Show_vue_vue_type_template_id_790931e6___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Show.vue?vue&type=template&id=790931e6& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/Users/Show.vue?vue&type=template&id=790931e6&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Show_vue_vue_type_template_id_790931e6___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Show_vue_vue_type_template_id_790931e6___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);
//# sourceMappingURL=22.js.map