(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[17],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/Roles/Show.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/pages/Roles/Show.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _layouts_App__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../layouts/App */ "./resources/js/layouts/App.vue");
/* harmony import */ var _components_pagination__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../components/pagination */ "./resources/js/components/pagination.vue");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var vform__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! vform */ "./node_modules/vform/dist/vform.common.js");
/* harmony import */ var vform__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(vform__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _components_modals_role_add__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../../components/modals/role/add */ "./resources/js/components/modals/role/add.vue");
/* harmony import */ var vuejs_datepicker__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! vuejs-datepicker */ "./node_modules/vuejs-datepicker/dist/vuejs-datepicker.esm.js");


function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

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
    LayoutDefault: _layouts_App__WEBPACK_IMPORTED_MODULE_1__["default"],
    PaginationNav: _components_pagination__WEBPACK_IMPORTED_MODULE_2__["default"],
    HasError: vform__WEBPACK_IMPORTED_MODULE_4__["HasError"],
    Datepicker: vuejs_datepicker__WEBPACK_IMPORTED_MODULE_6__["default"],
    FormModal: _components_modals_role_add__WEBPACK_IMPORTED_MODULE_5__["default"]
  },
  data: function data() {
    return {
      loader: false,
      role: null,
      permissions: null,
      ischanged: false,
      role_permissions: []
    };
  },
  created: function created() {
    this.fetchData();
  },
  methods: {
    fetchData: function fetchData() {
      var _this = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                _context.next = 2;
                return axios__WEBPACK_IMPORTED_MODULE_3___default.a.get('roles/' + _this.$route.params.role_id).then(function (_ref) {
                  var data = _ref.data;
                  _this.role = data.role;
                  var that = _this;
                  data.permissions.data.forEach(function (value) {
                    that.role_permissions.push(value.name);
                  });
                });

              case 2:
                axios__WEBPACK_IMPORTED_MODULE_3___default.a.get('permissions').then(function (_ref2) {
                  var data = _ref2.data;
                  _this.permissions = data.permissions.data;
                });

              case 3:
              case "end":
                return _context.stop();
            }
          }
        }, _callee);
      }))();
    },
    savePermissions: function savePermissions() {
      var _this2 = this;

      this.ischanged = false, axios__WEBPACK_IMPORTED_MODULE_3___default.a.put('/roles/' + this.$route.params.role_id + '/permissions', {
        permissions: this.role_permissions
      }).then(function (_ref3) {
        var data = _ref3.data;

        _this2.$swal.fire("Done!", "Role Permissions Successfully Updated", 'success');
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/Roles/Show.vue?vue&type=template&id=0a1461f8&":
/*!********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/pages/Roles/Show.vue?vue&type=template&id=0a1461f8& ***!
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
                _c("h4", { staticClass: "mb-0" }, [_vm._v("Role Details")]),
                _vm._v(" "),
                _c("form-modal", { ref: "FormModal" }),
                _vm._v(" "),
                _vm.role
                  ? _c("div", { staticClass: "page-title-right" }, [
                      _c(
                        "a",
                        {
                          staticClass:
                            "btn btn-success w-md waves-effect waves-light",
                          attrs: { href: "javascript:;" },
                          on: {
                            click: function($event) {
                              return _vm.$refs.FormModal.edit(_vm.role)
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
        _vm.role
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
                                _vm._s(_vm.role.name) +
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
                                    _vm.role.created_at,
                                    "DD/MM/YYYY"
                                  )
                                ) +
                                "\n                                  "
                            )
                          ])
                        ]),
                        _vm._v(" "),
                        _vm.permissions
                          ? _c("div", { staticClass: "col-md-12" }, [
                              _c("hr", { staticClass: "mt-4 mb-4" }),
                              _vm._v(" "),
                              _c("h4", { staticClass: "font-size-16 mb-5" }, [
                                _c("b", [_vm._v("Permissions")]),
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
                                            return _vm.savePermissions()
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
                                _vm._l(_vm.permissions, function(
                                  permission,
                                  index
                                ) {
                                  return _c(
                                    "div",
                                    { staticClass: "form-check col-md-3 mb-4" },
                                    [
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: _vm.role_permissions,
                                            expression: "role_permissions"
                                          }
                                        ],
                                        staticClass: "form-check-input",
                                        attrs: {
                                          type: "checkbox",
                                          id: "check" + index
                                        },
                                        domProps: {
                                          value: permission.name,
                                          checked: Array.isArray(
                                            _vm.role_permissions
                                          )
                                            ? _vm._i(
                                                _vm.role_permissions,
                                                permission.name
                                              ) > -1
                                            : _vm.role_permissions
                                        },
                                        on: {
                                          click: function($event) {
                                            _vm.ischanged = true
                                          },
                                          change: function($event) {
                                            var $$a = _vm.role_permissions,
                                              $$el = $event.target,
                                              $$c = $$el.checked ? true : false
                                            if (Array.isArray($$a)) {
                                              var $$v = permission.name,
                                                $$i = _vm._i($$a, $$v)
                                              if ($$el.checked) {
                                                $$i < 0 &&
                                                  (_vm.role_permissions = $$a.concat(
                                                    [$$v]
                                                  ))
                                              } else {
                                                $$i > -1 &&
                                                  (_vm.role_permissions = $$a
                                                    .slice(0, $$i)
                                                    .concat($$a.slice($$i + 1)))
                                              }
                                            } else {
                                              _vm.role_permissions = $$c
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
                                        [_vm._v(_vm._s(permission.name))]
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

/***/ "./resources/js/pages/Roles/Show.vue":
/*!*******************************************!*\
  !*** ./resources/js/pages/Roles/Show.vue ***!
  \*******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Show_vue_vue_type_template_id_0a1461f8___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Show.vue?vue&type=template&id=0a1461f8& */ "./resources/js/pages/Roles/Show.vue?vue&type=template&id=0a1461f8&");
/* harmony import */ var _Show_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Show.vue?vue&type=script&lang=js& */ "./resources/js/pages/Roles/Show.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Show_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Show_vue_vue_type_template_id_0a1461f8___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Show_vue_vue_type_template_id_0a1461f8___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/pages/Roles/Show.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/pages/Roles/Show.vue?vue&type=script&lang=js&":
/*!********************************************************************!*\
  !*** ./resources/js/pages/Roles/Show.vue?vue&type=script&lang=js& ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Show_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Show.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/Roles/Show.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Show_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/pages/Roles/Show.vue?vue&type=template&id=0a1461f8&":
/*!**************************************************************************!*\
  !*** ./resources/js/pages/Roles/Show.vue?vue&type=template&id=0a1461f8& ***!
  \**************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Show_vue_vue_type_template_id_0a1461f8___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Show.vue?vue&type=template&id=0a1461f8& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/Roles/Show.vue?vue&type=template&id=0a1461f8&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Show_vue_vue_type_template_id_0a1461f8___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Show_vue_vue_type_template_id_0a1461f8___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);
//# sourceMappingURL=17.js.map