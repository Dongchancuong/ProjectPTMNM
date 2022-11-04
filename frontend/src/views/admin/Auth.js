import React from 'react'
import '../../styles/Auth.scss'

export default function ({ setDangnhap }) {
    const routeChange = () => {
        setDangnhap(() => true);
    }

    return (
        <div className="Auth-background">
            <div className="Auth-form-container">
                <form className="Auth-form">
                    <div className="Auth-form-content">
                        <h3 className="Auth-form-title">Đăng nhập</h3>
                        <div className="form-group mt-3">
                            <label className='fs-6'>Tên đăng nhập</label>
                            <input
                                type="text"
                                className="form-control mt-1"
                                placeholder="Nhập tên đăng nhập"
                            />
                        </div>
                        <div className="form-group mt-3">
                            <label className='fs-6'>Mật khẩu</label>
                            <input
                                type="password"
                                className="form-control mt-1"
                                placeholder="Nhập mật khẩu"
                            />
                        </div>
                        <p className="text-center fs-6 mt-3 text-danger Auth-warning">*Tên đăng nhập hoặc mật khẩu không trùng khớp!</p>
                        <div className="d-grid gap-2 mt-4">
                            <button type="submit" className="btn btn-primary" onClick={routeChange}>
                                Đăng nhập
                            </button>
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
