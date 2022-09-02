(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[7],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/filters/pageContent.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/filters/pageContent.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var vue_select_dist_vue_select_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vue-select/dist/vue-select.css */ "./node_modules/vue-select/dist/vue-select.css");
/* harmony import */ var vue_select_dist_vue_select_css__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(vue_select_dist_vue_select_css__WEBPACK_IMPORTED_MODULE_1__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  props: ['fetchData'],
  data: function data() {
    return {
      filter: {
        search: null,
        page_id: null
      },
      pages: null
    };
  },
  created: function created() {
    this.getInfo();
  },
  methods: {
    getInfo: function getInfo() {
      var _this = this;

      axios__WEBPACK_IMPORTED_MODULE_0___default.a.get("pages", {
        params: {
          paginate: 0
        }
      }).then(function (_ref) {
        var data = _ref.data;
        _this.pages = data.success.pages;
      })["catch"](function (error) {
        console.log("Error......");
      });
    },
    clearFilter: function clearFilter() {
      this.filter.search = null;
      this.filter.page_id = null;
      this.fetchData(1, this.filter); // $('#collapse1')[0].click();
    },
    goFilter: function goFilter() {
      this.fetchData(1, this.filter); // $('#collapse1')[0].click();
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/modals/page/translation.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/modals/page/translation.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vform__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vform */ "./node_modules/vform/dist/vform.common.js");
/* harmony import */ var vform__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(vform__WEBPACK_IMPORTED_MODULE_0__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
      page: null,
      form: new vform__WEBPACK_IMPORTED_MODULE_0__["Form"]({
        id: null,
        content: null,
        name: null,
        lang: null
      })
    };
  },
  methods: {
    edit: function edit(page, lang) {
      // console.log(page.content.[lang],lang);
      this.form.reset();
      this.form.id = page.id;
      this.form.lang = lang;
      this.form.name = page.name;
      this.form.content = page.content ? page.content[lang] : null;
      this.page = page;
      $('#translationModal').modal('show');
    },
    update: function update() {
      var _this = this;

      this.form.put("page_translations/" + this.form.id).then(function (_ref) {
        var data = _ref.data;

        _this.fetchData();

        $('#translationModal').modal('hide');

        _this.$swal.fire('Done', 'Page Was Updated !', 'success');
      })["catch"](function (error) {
        console.log("Error......");
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/pagination.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/pagination.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  props: ['pageSize', 'currentPage', 'GoToPage', 'loading']
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/Pages/Translations.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/pages/Pages/Translations.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _layouts_App__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../layouts/App */ "./resources/js/layouts/App.vue");
/* harmony import */ var _components_pagination__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../components/pagination */ "./resources/js/components/pagination.vue");
/* harmony import */ var _components_modals_page_translation__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../components/modals/page/translation */ "./resources/js/components/modals/page/translation.vue");
/* harmony import */ var _components_filters_pageContent__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../components/filters/pageContent */ "./resources/js/components/filters/pageContent.vue");
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




 ///////////////////////////////

/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    LayoutDefault: _layouts_App__WEBPACK_IMPORTED_MODULE_0__["default"],
    PaginationNav: _components_pagination__WEBPACK_IMPORTED_MODULE_1__["default"],
    FormModal: _components_modals_page_translation__WEBPACK_IMPORTED_MODULE_2__["default"],
    FormFilter: _components_filters_pageContent__WEBPACK_IMPORTED_MODULE_3__["default"]
  },
  data: function data() {
    return {
      translations: null,
      locales: null,
      loader: false,
      filter: null
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
      var filter = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : null;
      this.filter = filter ? filter : this.filter;
      this.translations = null;
      this.loader = true;
      var data = {
        params: {
          page: num,
          filter: this.filter
        }
      };
      axios__WEBPACK_IMPORTED_MODULE_4___default.a.get('page_translations', data).then(function (_ref) {
        var data = _ref.data;
        _this.translations = data.success.translations;

        if (!data.success.translations.data.length && num != 1) {
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

/***/ "./node_modules/css-loader/index.js?!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-select/dist/vue-select.css":
/*!*************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--5-1!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-select/dist/vue-select.css ***!
  \*************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, ".v-select{position:relative;font-family:inherit}.v-select,.v-select *{box-sizing:border-box}@-webkit-keyframes vSelectSpinner{0%{transform:rotate(0deg)}to{transform:rotate(1turn)}}@keyframes vSelectSpinner{0%{transform:rotate(0deg)}to{transform:rotate(1turn)}}.vs__fade-enter-active,.vs__fade-leave-active{pointer-events:none;transition:opacity .15s cubic-bezier(1,.5,.8,1)}.vs__fade-enter,.vs__fade-leave-to{opacity:0}.vs--disabled .vs__clear,.vs--disabled .vs__dropdown-toggle,.vs--disabled .vs__open-indicator,.vs--disabled .vs__search,.vs--disabled .vs__selected{cursor:not-allowed;background-color:#f8f8f8}.v-select[dir=rtl] .vs__actions{padding:0 3px 0 6px}.v-select[dir=rtl] .vs__clear{margin-left:6px;margin-right:0}.v-select[dir=rtl] .vs__deselect{margin-left:0;margin-right:2px}.v-select[dir=rtl] .vs__dropdown-menu{text-align:right}.vs__dropdown-toggle{-webkit-appearance:none;-moz-appearance:none;appearance:none;display:flex;padding:0 0 4px;background:none;border:1px solid rgba(60,60,60,.26);border-radius:4px;white-space:normal}.vs__selected-options{display:flex;flex-basis:100%;flex-grow:1;flex-wrap:wrap;padding:0 2px;position:relative}.vs__actions{display:flex;align-items:center;padding:4px 6px 0 3px}.vs--searchable .vs__dropdown-toggle{cursor:text}.vs--unsearchable .vs__dropdown-toggle{cursor:pointer}.vs--open .vs__dropdown-toggle{border-bottom-color:transparent;border-bottom-left-radius:0;border-bottom-right-radius:0}.vs__open-indicator{fill:rgba(60,60,60,.5);transform:scale(1);transition:transform .15s cubic-bezier(1,-.115,.975,.855);transition-timing-function:cubic-bezier(1,-.115,.975,.855)}.vs--open .vs__open-indicator{transform:rotate(180deg) scale(1)}.vs--loading .vs__open-indicator{opacity:0}.vs__clear{fill:rgba(60,60,60,.5);padding:0;border:0;background-color:transparent;cursor:pointer;margin-right:8px}.vs__dropdown-menu{display:block;box-sizing:border-box;position:absolute;top:calc(100% - 1px);left:0;z-index:1000;padding:5px 0;margin:0;width:100%;max-height:350px;min-width:160px;overflow-y:auto;box-shadow:0 3px 6px 0 rgba(0,0,0,.15);border:1px solid rgba(60,60,60,.26);border-top-style:none;border-radius:0 0 4px 4px;text-align:left;list-style:none;background:#fff}.vs__no-options{text-align:center}.vs__dropdown-option{line-height:1.42857143;display:block;padding:3px 20px;clear:both;color:#333;white-space:nowrap}.vs__dropdown-option:hover{cursor:pointer}.vs__dropdown-option--highlight{background:#5897fb;color:#fff}.vs__dropdown-option--disabled{background:inherit;color:rgba(60,60,60,.5)}.vs__dropdown-option--disabled:hover{cursor:inherit}.vs__selected{display:flex;align-items:center;background-color:#f0f0f0;border:1px solid rgba(60,60,60,.26);border-radius:4px;color:#333;line-height:1.4;margin:4px 2px 0;padding:0 .25em;z-index:0}.vs__deselect{display:inline-flex;-webkit-appearance:none;-moz-appearance:none;appearance:none;margin-left:4px;padding:0;border:0;cursor:pointer;background:none;fill:rgba(60,60,60,.5);text-shadow:0 1px 0 #fff}.vs--single .vs__selected{background-color:transparent;border-color:transparent}.vs--single.vs--open .vs__selected{position:absolute;opacity:.4}.vs--single.vs--searching .vs__selected{display:none}.vs__search::-webkit-search-cancel-button{display:none}.vs__search::-ms-clear,.vs__search::-webkit-search-decoration,.vs__search::-webkit-search-results-button,.vs__search::-webkit-search-results-decoration{display:none}.vs__search,.vs__search:focus{-webkit-appearance:none;-moz-appearance:none;appearance:none;line-height:1.4;font-size:1em;border:1px solid transparent;border-left:none;outline:none;margin:4px 0 0;padding:0 7px;background:none;box-shadow:none;width:0;max-width:100%;flex-grow:1;z-index:1}.vs__search::-webkit-input-placeholder{color:inherit}.vs__search::-moz-placeholder{color:inherit}.vs__search:-ms-input-placeholder{color:inherit}.vs__search::-ms-input-placeholder{color:inherit}.vs__search::placeholder{color:inherit}.vs--unsearchable .vs__search{opacity:1}.vs--unsearchable:not(.vs--disabled) .vs__search:hover{cursor:pointer}.vs--single.vs--searching:not(.vs--open):not(.vs--loading) .vs__search{opacity:.2}.vs__spinner{align-self:center;opacity:0;font-size:5px;text-indent:-9999em;overflow:hidden;border:.9em solid hsla(0,0%,39.2%,.1);border-left-color:rgba(60,60,60,.45);transform:translateZ(0);-webkit-animation:vSelectSpinner 1.1s linear infinite;animation:vSelectSpinner 1.1s linear infinite;transition:opacity .1s}.vs__spinner,.vs__spinner:after{border-radius:50%;width:5em;height:5em}.vs--loading .vs__spinner{opacity:1}", ""]);

// exports


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/filters/pageContent.vue?vue&type=template&id=236845db&":
/*!**********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/filters/pageContent.vue?vue&type=template&id=236845db& ***!
  \**********************************************************************************************************************************************************************************************************************/
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
  return _c("div", { staticClass: "col-12" }, [
    _c("div", { staticClass: "card" }, [
      _c("div", { staticClass: "card-body" }, [
        _c("div", { staticClass: "row", attrs: { dir: "rtl" } }, [
          _c(
            "div",
            { staticClass: "form-inline col-md-3", attrs: { dir: "ltr" } },
            [
              _c("div", { staticClass: "search-box" }, [
                _c("div", { staticClass: "position-relative" }, [
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.filter.search,
                        expression: "filter.search"
                      }
                    ],
                    staticClass: "form-control bg-light rounded pt-1 pb-1",
                    attrs: { type: "text", placeholder: "Search..." },
                    domProps: { value: _vm.filter.search },
                    on: {
                      change: _vm.goFilter,
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.filter, "search", $event.target.value)
                      }
                    }
                  }),
                  _vm._v(" "),
                  _c("i", {
                    staticClass: "mdi mdi-magnify search-icon",
                    staticStyle: { "margin-top": "-3px" }
                  })
                ])
              ])
            ]
          ),
          _vm._v(" "),
          _vm.pages && _vm.pages.length
            ? _c(
                "div",
                { staticClass: "col-md-3", attrs: { dir: "ltr" } },
                [
                  _c("v-select", {
                    staticClass: "vselect",
                    staticStyle: { width: "100%" },
                    attrs: {
                      label: "name",
                      placeholder: "Page Name",
                      options: _vm.pages,
                      reduce: function(val) {
                        return val.id
                      }
                    },
                    on: { input: _vm.goFilter },
                    model: {
                      value: _vm.filter.page_id,
                      callback: function($$v) {
                        _vm.$set(_vm.filter, "page_id", $$v)
                      },
                      expression: "filter.page_id"
                    }
                  })
                ],
                1
              )
            : _vm._e()
        ])
      ])
    ])
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/modals/page/translation.vue?vue&type=template&id=b9f56582&":
/*!**************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/modals/page/translation.vue?vue&type=template&id=b9f56582& ***!
  \**************************************************************************************************************************************************************************************************************************/
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
        id: "translationModal",
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
                  return _vm.update($event)
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
                  [_vm._v("Update " + _vm._s(_vm.form.name))]
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
                _vm.form.lang
                  ? _c(
                      "div",
                      { staticClass: "name-12 mt-3" },
                      [
                        _c("label", [
                          _vm._v(
                            _vm._s(_vm.form.name.toUpperCase()) +
                              " (" +
                              _vm._s(_vm.form.lang.toUpperCase()) +
                              ")"
                          )
                        ]),
                        _vm._v(" "),
                        _c("textarea", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.form.content,
                              expression: "form.content"
                            }
                          ],
                          staticClass: "form-control",
                          class: {
                            "is-invalid": _vm.form.errors.has("content")
                          },
                          attrs: {
                            dir: _vm.form.lang == "ar" ? "rtl" : "ltr",
                            rows: "3"
                          },
                          domProps: { value: _vm.form.content },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.$set(_vm.form, "content", $event.target.value)
                            }
                          }
                        }),
                        _vm._v(" "),
                        _c("has-error", {
                          attrs: { form: _vm.form, field: "content" }
                        })
                      ],
                      1
                    )
                  : _vm._e()
              ]),
              _vm._v(" "),
              _vm._m(0)
            ]
          )
        ]
      )
    ]
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "modal-footer" }, [
      _c(
        "button",
        {
          staticClass: "btn btn-light",
          attrs: { type: "button", "data-bs-dismiss": "modal" }
        },
        [_vm._v("Close")]
      ),
      _vm._v(" "),
      _c(
        "button",
        { staticClass: "btn btn-primary", attrs: { type: "submit" } },
        [_vm._v("Save")]
      )
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/pagination.vue?vue&type=template&id=603a89b6&":
/*!*************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/pagination.vue?vue&type=template&id=603a89b6& ***!
  \*************************************************************************************************************************************************************************************************************/
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
  return _c("nav", { attrs: { "aria-label": "Page navigation example" } }, [
    !_vm.loading
      ? _c(
          "ul",
          { staticClass: "pagination" },
          [
            _c(
              "li",
              {
                staticClass: "page-item",
                class: { disabled: _vm.currentPage == 1 }
              },
              [
                _c(
                  "a",
                  {
                    staticClass: "page-link",
                    attrs: { href: "javascript:;" },
                    on: {
                      click: function($event) {
                        _vm.currentPage--
                        _vm.GoToPage(_vm.currentPage)
                      }
                    }
                  },
                  [_vm._v("Previous")]
                )
              ]
            ),
            _vm._v(" "),
            _vm._l(_vm.pageSize, function(index) {
              return index <= _vm.currentPage + 5 &&
                index >= _vm.currentPage - 5
                ? _c(
                    "li",
                    {
                      key: index,
                      staticClass: "page-item",
                      class: { active: index == _vm.currentPage }
                    },
                    [
                      index < _vm.currentPage + 5 && index > _vm.currentPage - 5
                        ? _c(
                            "a",
                            {
                              staticClass: "page-link",
                              attrs: { href: "javascript:;" },
                              on: {
                                click: function($event) {
                                  return _vm.GoToPage(index)
                                }
                              }
                            },
                            [_vm._v(_vm._s(index))]
                          )
                        : _c(
                            "a",
                            {
                              staticClass: "page-link disabled",
                              attrs: { href: "javascript:;" }
                            },
                            [_vm._v("...")]
                          )
                    ]
                  )
                : _vm._e()
            }),
            _vm._v(" "),
            _c(
              "li",
              {
                staticClass: "page-item",
                class: { disabled: _vm.currentPage == _vm.pageSize }
              },
              [
                _c(
                  "a",
                  {
                    staticClass: "page-link",
                    attrs: { href: "javascript:;" },
                    on: {
                      click: function($event) {
                        _vm.currentPage++
                        _vm.GoToPage(_vm.currentPage)
                      }
                    }
                  },
                  [_vm._v("Next")]
                )
              ]
            ),
            _vm._v(" "),
            _c("li", { staticClass: "page-item", class: { disabled: false } }, [
              _c(
                "a",
                { staticClass: "page-link", attrs: { href: "javascript:;" } },
                [_vm._v(_vm._s(_vm.currentPage) + " / " + _vm._s(_vm.pageSize))]
              )
            ])
          ],
          2
        )
      : _c(
          "ul",
          { staticClass: "pagination" },
          [
            _c(
              "li",
              {
                staticClass: "page-item",
                class: { disabled: _vm.currentPage == 1 }
              },
              [
                _c(
                  "a",
                  { staticClass: "page-link", attrs: { href: "javascript:;" } },
                  [_vm._v("Previous")]
                )
              ]
            ),
            _vm._v(" "),
            _vm._l(_vm.pageSize, function(index) {
              return _c(
                "li",
                {
                  key: index,
                  staticClass: "page-item",
                  class: { active: index == _vm.currentPage }
                },
                [
                  _c(
                    "a",
                    {
                      staticClass: "page-link",
                      attrs: { href: "javascript:;" }
                    },
                    [_vm._v(_vm._s(index))]
                  )
                ]
              )
            }),
            _vm._v(" "),
            _c(
              "li",
              {
                staticClass: "page-item",
                class: { disabled: _vm.currentPage == _vm.pageSize }
              },
              [
                _c(
                  "a",
                  { staticClass: "page-link", attrs: { href: "javascript:;" } },
                  [_vm._v("Next")]
                )
              ]
            )
          ],
          2
        )
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/Pages/Translations.vue?vue&type=template&id=58676994&":
/*!****************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/pages/Pages/Translations.vue?vue&type=template&id=58676994& ***!
  \****************************************************************************************************************************************************************************************************************/
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
                _c("h4", { staticClass: "mb-0" }, [
                  _vm._v("Pages Content Table")
                ]),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "page-title-right" },
                  [
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
                _vm.translations && _vm.translations.data.length && _vm.locales
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
                                _c("th", [_vm._v("#")]),
                                _vm._v(" "),
                                _c("th", [_vm._v("Name")]),
                                _vm._v(" "),
                                _c("th", [_vm._v("Page")]),
                                _vm._v(" "),
                                _c("th", [_vm._v("Languages")])
                              ])
                            ]),
                            _vm._v(" "),
                            _c(
                              "tbody",
                              _vm._l(_vm.translations.data, function(
                                translation,
                                index
                              ) {
                                return _c("tr", [
                                  _c("td", [
                                    _vm._v(
                                      _vm._s(
                                        _vm.translations.current_page *
                                          (index + 1)
                                      )
                                    )
                                  ]),
                                  _vm._v(" "),
                                  _c("td", [
                                    _vm._v(
                                      _vm._s(
                                        _vm.truncate(
                                          translation.content["en"],
                                          50
                                        )
                                      )
                                    )
                                  ]),
                                  _vm._v(" "),
                                  _c("td", [
                                    _vm._v(_vm._s(translation.page.name))
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
                                          translation.content &&
                                          translation.content[index]
                                            ? _c(
                                                "div",
                                                {
                                                  staticClass:
                                                    "btn btn-sm btn-info btn-soft-info waves-effect waves-light m-1",
                                                  on: {
                                                    click: function($event) {
                                                      return _vm.$refs.FormModal.edit(
                                                        translation,
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
                                                        translation,
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
                                  )
                                ])
                              }),
                              0
                            )
                          ]
                        ),
                        _vm._v(" "),
                        _vm.translations.last_page > 1
                          ? _c("pagination-nav", {
                              attrs: {
                                pageSize: _vm.translations.last_page,
                                currentPage: _vm.translations.current_page,
                                GoToPage: _vm.fetchData,
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

/***/ "./node_modules/vue-select/dist/vue-select.css":
/*!*****************************************************!*\
  !*** ./node_modules/vue-select/dist/vue-select.css ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../css-loader??ref--5-1!../../postcss-loader/src??ref--5-2!./vue-select.css */ "./node_modules/css-loader/index.js?!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-select/dist/vue-select.css");

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(/*! ../../style-loader/lib/addStyles.js */ "./node_modules/style-loader/lib/addStyles.js")(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ }),

/***/ "./resources/js/components/filters/pageContent.vue":
/*!*********************************************************!*\
  !*** ./resources/js/components/filters/pageContent.vue ***!
  \*********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _pageContent_vue_vue_type_template_id_236845db___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./pageContent.vue?vue&type=template&id=236845db& */ "./resources/js/components/filters/pageContent.vue?vue&type=template&id=236845db&");
/* harmony import */ var _pageContent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./pageContent.vue?vue&type=script&lang=js& */ "./resources/js/components/filters/pageContent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _pageContent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _pageContent_vue_vue_type_template_id_236845db___WEBPACK_IMPORTED_MODULE_0__["render"],
  _pageContent_vue_vue_type_template_id_236845db___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/filters/pageContent.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/filters/pageContent.vue?vue&type=script&lang=js&":
/*!**********************************************************************************!*\
  !*** ./resources/js/components/filters/pageContent.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_pageContent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./pageContent.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/filters/pageContent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_pageContent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/filters/pageContent.vue?vue&type=template&id=236845db&":
/*!****************************************************************************************!*\
  !*** ./resources/js/components/filters/pageContent.vue?vue&type=template&id=236845db& ***!
  \****************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_pageContent_vue_vue_type_template_id_236845db___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./pageContent.vue?vue&type=template&id=236845db& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/filters/pageContent.vue?vue&type=template&id=236845db&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_pageContent_vue_vue_type_template_id_236845db___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_pageContent_vue_vue_type_template_id_236845db___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/modals/page/translation.vue":
/*!*************************************************************!*\
  !*** ./resources/js/components/modals/page/translation.vue ***!
  \*************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _translation_vue_vue_type_template_id_b9f56582___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./translation.vue?vue&type=template&id=b9f56582& */ "./resources/js/components/modals/page/translation.vue?vue&type=template&id=b9f56582&");
/* harmony import */ var _translation_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./translation.vue?vue&type=script&lang=js& */ "./resources/js/components/modals/page/translation.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _translation_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _translation_vue_vue_type_template_id_b9f56582___WEBPACK_IMPORTED_MODULE_0__["render"],
  _translation_vue_vue_type_template_id_b9f56582___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/modals/page/translation.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/modals/page/translation.vue?vue&type=script&lang=js&":
/*!**************************************************************************************!*\
  !*** ./resources/js/components/modals/page/translation.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_translation_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./translation.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/modals/page/translation.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_translation_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/modals/page/translation.vue?vue&type=template&id=b9f56582&":
/*!********************************************************************************************!*\
  !*** ./resources/js/components/modals/page/translation.vue?vue&type=template&id=b9f56582& ***!
  \********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_translation_vue_vue_type_template_id_b9f56582___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./translation.vue?vue&type=template&id=b9f56582& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/modals/page/translation.vue?vue&type=template&id=b9f56582&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_translation_vue_vue_type_template_id_b9f56582___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_translation_vue_vue_type_template_id_b9f56582___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/pagination.vue":
/*!************************************************!*\
  !*** ./resources/js/components/pagination.vue ***!
  \************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _pagination_vue_vue_type_template_id_603a89b6___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./pagination.vue?vue&type=template&id=603a89b6& */ "./resources/js/components/pagination.vue?vue&type=template&id=603a89b6&");
/* harmony import */ var _pagination_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./pagination.vue?vue&type=script&lang=js& */ "./resources/js/components/pagination.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _pagination_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _pagination_vue_vue_type_template_id_603a89b6___WEBPACK_IMPORTED_MODULE_0__["render"],
  _pagination_vue_vue_type_template_id_603a89b6___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/pagination.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/pagination.vue?vue&type=script&lang=js&":
/*!*************************************************************************!*\
  !*** ./resources/js/components/pagination.vue?vue&type=script&lang=js& ***!
  \*************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_pagination_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./pagination.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/pagination.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_pagination_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/pagination.vue?vue&type=template&id=603a89b6&":
/*!*******************************************************************************!*\
  !*** ./resources/js/components/pagination.vue?vue&type=template&id=603a89b6& ***!
  \*******************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_pagination_vue_vue_type_template_id_603a89b6___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./pagination.vue?vue&type=template&id=603a89b6& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/pagination.vue?vue&type=template&id=603a89b6&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_pagination_vue_vue_type_template_id_603a89b6___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_pagination_vue_vue_type_template_id_603a89b6___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/pages/Pages/Translations.vue":
/*!***************************************************!*\
  !*** ./resources/js/pages/Pages/Translations.vue ***!
  \***************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Translations_vue_vue_type_template_id_58676994___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Translations.vue?vue&type=template&id=58676994& */ "./resources/js/pages/Pages/Translations.vue?vue&type=template&id=58676994&");
/* harmony import */ var _Translations_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Translations.vue?vue&type=script&lang=js& */ "./resources/js/pages/Pages/Translations.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Translations_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Translations_vue_vue_type_template_id_58676994___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Translations_vue_vue_type_template_id_58676994___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/pages/Pages/Translations.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/pages/Pages/Translations.vue?vue&type=script&lang=js&":
/*!****************************************************************************!*\
  !*** ./resources/js/pages/Pages/Translations.vue?vue&type=script&lang=js& ***!
  \****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Translations_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Translations.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/Pages/Translations.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Translations_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/pages/Pages/Translations.vue?vue&type=template&id=58676994&":
/*!**********************************************************************************!*\
  !*** ./resources/js/pages/Pages/Translations.vue?vue&type=template&id=58676994& ***!
  \**********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Translations_vue_vue_type_template_id_58676994___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Translations.vue?vue&type=template&id=58676994& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/Pages/Translations.vue?vue&type=template&id=58676994&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Translations_vue_vue_type_template_id_58676994___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Translations_vue_vue_type_template_id_58676994___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);
//# sourceMappingURL=7.js.map