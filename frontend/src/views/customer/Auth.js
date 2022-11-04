import React, { useState } from 'react'
import '../../styles/Auth.scss'

export default function (props) {
    let [authMode, setAuthMode] = useState("login")

    const changeAuthMode = () => {
        setAuthMode(authMode === "login" ? "signup" : "login")
    }

    if (authMode === "login") {
        return (
            <div className="Auth-background">
                <div className="Auth-form-container">
                    <form className="Auth-form">
                        <div className="Auth-form-content">
                            <h3 className="Auth-form-title">Đăng nhập</h3>
                            <div className="form-group mt-3">
                                <label>Tên đăng nhập</label>
                                <input
                                    type="email"
                                    className="form-control mt-1"
                                    placeholder="Nhập tên đăng nhập"
                                />
                            </div>
                            <div className="form-group mt-3">
                                <label>Mật khẩu</label>
                                <input
                                    type="password"
                                    className="form-control mt-1"
                                    placeholder="Nhập mật khẩu"
                                />
                            </div>
                            <div className="d-grid gap-2 mt-4">
                                <button type="submit" className="btn btn-primary">
                                    Đăng nhập
                                </button>
                            </div>
                            <div className="text-center mt-3">
                                Chưa đăng ký tài khoản?{" "}
                                <span className="link-primary" onClick={changeAuthMode}>
                                    Đăng ký
                                </span>
                            </div>
                            <p className="link-primary text-center mt-2">
                                Quên mật khẩu?
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        )
    }

    return (
        <div className="Auth-background">
            <div className="Auth-form-container">
                <form className="Auth-form">
                    <div className="Auth-form-content">
                        <h3 className="Auth-form-title">Đăng ký</h3>
                        <div className="form-group mt-3">
                            <label>Tên đăng nhập</label>
                            <input
                                type="text"
                                className="form-control mt-1"
                                placeholder="Nhập tên đăng nhập"
                            />
                        </div>
                        <div className="form-group mt-3">
                            <label>Mật khẩu</label>
                            <input
                                type="password"
                                className="form-control mt-1"
                                placeholder="Nhập mật khẩu"
                            />
                        </div>
                        <div className="form-group mt-3">
                            <label>Nhập lại mật khẩu</label>
                            <input
                                type="password"
                                className="form-control mt-1"
                                placeholder="Nhập lại mật khẩu"
                            />
                        </div>
                        <div className="d-grid gap-2 mt-3">
                            <button type="submit" className="btn btn-primary">
                                Đăng ký
                            </button>
                        </div>
                        <div className="text-center mt-3">
                            Đã đăng ký tài khoản?{" "}
                            <span className="link-primary" onClick={changeAuthMode}>
                                Đăng nhập
                            </span>
                        </div>
                        <p className="link-primary text-center mt-2">
                            Quên mật khẩu?
                        </p>
                    </div>
                </form>
            </div>
        </div>
    )
}
