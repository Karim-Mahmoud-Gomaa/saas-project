(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[3],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/modals/page/add.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/modals/page/add.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************************/
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
      types: 3,
      image: null,
      form: new vform__WEBPACK_IMPORTED_MODULE_0__["Form"]({
        id: null,
        name: null,
        title: null,
        keywords: null,
        description: null,
        image: null,
        is_404: false,
        is_home: false
      }),
      errors: null
    };
  },
  watch: {
    types: function types(type) {
      this.form.is_home = type == 1 ? true : false;
      this.form.is_404 = type == 2 ? true : false;
    }
  },
  methods: {
    create: function create() {
      this.form.reset();
      this.image = null;
      this.errors = null;
      $('#pageModal').modal('show');
    },
    store: function store() {
      var _this = this;

      this.form.post("pages").then(function (_ref) {
        var data = _ref.data;

        // this.saveImage(data.success);
        _this.fetchData();

        $('#pageModal').modal('hide');
      })["catch"](function (error) {
        _this.errors = error.response.data.errors_bag;
      });
    },
    edit: function edit(form) {
      this.form.reset();
      this.image = null;
      this.errors = null;
      this.form.fill(form); //change radio button

      if (form.is_home) {
        this.types = 1;
      } else if (form.is_404) {
        this.types = 2;
      } else {
        this.types = 3;
      }

      $('#pageModal').modal('show');
    },
    onFileChange: function onFileChange(e) {
      var files = e.target.files || e.dataTransfer.files;

      if (files.length) {
        this.image = files[0];
      }
    },
    saveImage: function saveImage(id) {
      var _this2 = this;

      if (this.image) {
        var fd = new FormData();
        fd.append("image", this.image);
        fd.append("blog_id", id);
        axios__WEBPACK_IMPORTED_MODULE_1___default.a.post('/api/blog_image', fd, {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        }).then(function (_ref2) {
          var data = _ref2.data;

          _this2.fetchData();

          $('#formModal').modal('hide');
        });
      } else {
        this.fetchData();
        $('#formModal').modal('hide');
      }
    },
    update: function update() {
      var _this3 = this;

      this.form.put("pages/" + this.form.id).then(function (_ref3) {
        var data = _ref3.data;

        _this3.fetchData();

        $('#pageModal').modal('hide');
      })["catch"](function (error) {
        console.log("Error......");
      });
    },
    restore: function restore(id) {
      var _this4 = this;

      axios__WEBPACK_IMPORTED_MODULE_1___default.a.post("pages/" + id + '/restore').then(function (_ref4) {
        var data = _ref4.data;

        _this4.fetchData();

        _this4.$swal.fire(data.message, data.success + '!', 'success');
      })["catch"](function (error) {
        console.log("Error......");
      });
    },
    destroy: function destroy(id) {
      var _this5 = this;

      this.$swal.fire({
        title: 'warning',
        text: "Are you sure you want to remove this page?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: "cancel",
        confirmButtonText: "Yes,Delete It!"
      }).then(function (result) {
        if (result.value) {
          axios__WEBPACK_IMPORTED_MODULE_1___default.a["delete"]('pages/' + id).then(function (response) {
            _this5.$swal.fire(response.data.message, response.data.success + '!', 'success');

            _this5.fetchData();
          })["catch"](function () {
            _this5.$swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Something went wrong!',
              footer: '<a href>Why do I have this issue?</a>'
            });
          });
        }
      });
    },
    forceDestroy: function forceDestroy(id) {
      var _this6 = this;

      this.$swal.fire({
        title: 'warning',
        text: "Are you sure you want to remove this page?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: "cancel",
        confirmButtonText: "Yes,Delete It!"
      }).then(function (result) {
        if (result.value) {
          axios__WEBPACK_IMPORTED_MODULE_1___default.a["delete"]('pages/' + id + '/force').then(function (response) {
            _this6.$swal.fire(response.data.message, response.data.success + '!', 'success');

            _this6.fetchData();
          })["catch"](function () {
            _this6.$swal.fire({
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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/modals/page/add.vue?vue&type=template&id=97899da2&":
/*!******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/modals/page/add.vue?vue&type=template&id=97899da2& ***!
  \******************************************************************************************************************************************************************************************************************/
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
        id: "pageModal",
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
                  [_vm._v(_vm._s(_vm.form.id ? "Update" : "Add New Page"))]
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
                _c(
                  "div",
                  { staticClass: "col-12 mt-3" },
                  [
                    _vm._l(_vm.errors, function(error_group) {
                      return [
                        _vm._l(error_group, function(error) {
                          return [
                            _c(
                              "div",
                              {
                                staticClass: "alert alert-danger",
                                attrs: { role: "alert" }
                              },
                              [_vm._v(_vm._s(error))]
                            )
                          ]
                        })
                      ]
                    })
                  ],
                  2
                ),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "col-6 mt-3" },
                  [
                    _c("label", [_vm._v("Name")]),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.form.name,
                          expression: "form.name"
                        }
                      ],
                      staticClass: "form-control",
                      class: { "is-invalid": _vm.form.errors.has("name") },
                      attrs: {
                        type: "text",
                        autocomplete: "off",
                        required: ""
                      },
                      domProps: { value: _vm.form.name },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(_vm.form, "name", $event.target.value)
                        }
                      }
                    }),
                    _vm._v(" "),
                    _c("has-error", {
                      attrs: { form: _vm.form, field: "name" }
                    })
                  ],
                  1
                ),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "col-6 mt-3" },
                  [
                    _c("label", [_vm._v("Title")]),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.form.title,
                          expression: "form.title"
                        }
                      ],
                      staticClass: "form-control",
                      class: { "is-invalid": _vm.form.errors.has("title") },
                      attrs: {
                        type: "text",
                        autocomplete: "off",
                        required: ""
                      },
                      domProps: { value: _vm.form.title },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(_vm.form, "title", $event.target.value)
                        }
                      }
                    }),
                    _vm._v(" "),
                    _c("has-error", {
                      attrs: { form: _vm.form, field: "title" }
                    })
                  ],
                  1
                ),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "col-12 mt-3" },
                  [
                    _c("label", [_vm._v("Keywords")]),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.form.keywords,
                          expression: "form.keywords"
                        }
                      ],
                      staticClass: "form-control",
                      class: { "is-invalid": _vm.form.errors.has("keywords") },
                      attrs: { type: "text", autocomplete: "off" },
                      domProps: { value: _vm.form.keywords },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(_vm.form, "keywords", $event.target.value)
                        }
                      }
                    }),
                    _vm._v(" "),
                    _c("has-error", {
                      attrs: { form: _vm.form, field: "keywords" }
                    })
                  ],
                  1
                ),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "col-12 mt-3" },
                  [
                    _c("label", [_vm._v("Description")]),
                    _vm._v(" "),
                    _c("textarea", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.form.description,
                          expression: "form.description"
                        }
                      ],
                      staticClass: "form-control",
                      class: {
                        "is-invalid": _vm.form.errors.has("description")
                      },
                      attrs: { rows: "5" },
                      domProps: { value: _vm.form.description },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(_vm.form, "description", $event.target.value)
                        }
                      }
                    }),
                    _vm._v(" "),
                    _c("has-error", {
                      attrs: { form: _vm.form, field: "description" }
                    })
                  ],
                  1
                ),
                _vm._v(" "),
                _c("div", { staticClass: "col-12 row mt-3" }, [
                  _c("label", [_vm._v("Page Type")]),
                  _vm._v(" "),
                  _c("div", { staticClass: "col-4" }, [
                    _c("div", { staticClass: "form-check mb-3" }, [
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.types,
                            expression: "types"
                          }
                        ],
                        staticClass: "form-check-input",
                        attrs: {
                          value: "1",
                          type: "radio",
                          name: "formRadios",
                          id: "formRadios1"
                        },
                        domProps: { checked: _vm._q(_vm.types, "1") },
                        on: {
                          change: function($event) {
                            _vm.types = "1"
                          }
                        }
                      }),
                      _vm._v(" "),
                      _c(
                        "label",
                        {
                          staticClass: "form-check-label",
                          attrs: { for: "formRadios1" }
                        },
                        [_vm._v(" Home Page ")]
                      )
                    ])
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "col-4" }, [
                    _c("div", { staticClass: "form-check mb-3" }, [
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.types,
                            expression: "types"
                          }
                        ],
                        staticClass: "form-check-input",
                        attrs: {
                          value: "2",
                          type: "radio",
                          name: "formRadios",
                          id: "formRadios2"
                        },
                        domProps: { checked: _vm._q(_vm.types, "2") },
                        on: {
                          change: function($event) {
                            _vm.types = "2"
                          }
                        }
                      }),
                      _vm._v(" "),
                      _c(
                        "label",
                        {
                          staticClass: "form-check-label",
                          attrs: { for: "formRadios2" }
                        },
                        [_vm._v(" 404 Page ")]
                      )
                    ])
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "col-4" }, [
                    _c("div", { staticClass: "form-check mb-3" }, [
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.types,
                            expression: "types"
                          }
                        ],
                        staticClass: "form-check-input",
                        attrs: {
                          value: "3",
                          type: "radio",
                          name: "formRadios",
                          id: "formRadios3"
                        },
                        domProps: { checked: _vm._q(_vm.types, "3") },
                        on: {
                          change: function($event) {
                            _vm.types = "3"
                          }
                        }
                      }),
                      _vm._v(" "),
                      _c(
                        "label",
                        {
                          staticClass: "form-check-label",
                          attrs: { for: "formRadios3" }
                        },
                        [_vm._v(" Other Page ")]
                      )
                    ])
                  ])
                ]),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "col-6 mt-3" },
                  [
                    _vm.image
                      ? _c("i", {
                          staticClass: "fa-2x fa-check-circle far text-success"
                        })
                      : _vm._e(),
                    _vm._v(" "),
                    _c(
                      "a",
                      {
                        staticClass:
                          "btn btn-info btn-sm m-2 waves-effect mt-0 waves-light font-size-16",
                        attrs: { href: "javascript:;" },
                        on: {
                          click: function($event) {
                            return _vm.$refs.file1.click()
                          }
                        }
                      },
                      [
                        _c("i", { staticClass: "fas fa-upload" }),
                        _vm._v(" Upload Featured Image")
                      ]
                    ),
                    _vm._v(" "),
                    _c("input", {
                      ref: "file1",
                      staticClass: "hidden",
                      attrs: { type: "file", accept: "image/*" },
                      on: {
                        change: function($event) {
                          return _vm.onFileChange($event)
                        }
                      }
                    }),
                    _vm._v(" "),
                    _c("has-error", {
                      attrs: { form: _vm.form, field: "logo" }
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

/***/ "./resources/js/components/modals/page/add.vue":
/*!*****************************************************!*\
  !*** ./resources/js/components/modals/page/add.vue ***!
  \*****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _add_vue_vue_type_template_id_97899da2___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./add.vue?vue&type=template&id=97899da2& */ "./resources/js/components/modals/page/add.vue?vue&type=template&id=97899da2&");
/* harmony import */ var _add_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./add.vue?vue&type=script&lang=js& */ "./resources/js/components/modals/page/add.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _add_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _add_vue_vue_type_template_id_97899da2___WEBPACK_IMPORTED_MODULE_0__["render"],
  _add_vue_vue_type_template_id_97899da2___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/modals/page/add.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/modals/page/add.vue?vue&type=script&lang=js&":
/*!******************************************************************************!*\
  !*** ./resources/js/components/modals/page/add.vue?vue&type=script&lang=js& ***!
  \******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./add.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/modals/page/add.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/modals/page/add.vue?vue&type=template&id=97899da2&":
/*!************************************************************************************!*\
  !*** ./resources/js/components/modals/page/add.vue?vue&type=template&id=97899da2& ***!
  \************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_template_id_97899da2___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./add.vue?vue&type=template&id=97899da2& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/modals/page/add.vue?vue&type=template&id=97899da2&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_template_id_97899da2___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_add_vue_vue_type_template_id_97899da2___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



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



/***/ })

}]);
//# sourceMappingURL=3.js.map