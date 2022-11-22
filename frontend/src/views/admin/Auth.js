import React, { useState } from 'react'
import '../../styles/Auth.scss'
import AuthAPI from './AuthAPI'

export default function () {
    const {http, setToken} = AuthAPI();
    const [username, setUsername] = useState()
    const [password, setPassword] = useState()

    const submitForm = () => {
        //call api
        http.post('/login',{username:username, password:password}).then((res) => {
            setToken(res.data.user, res.data.access_token)
        })
    }

    // const routeChange = () => {
    //     setDangnhap(() => true);
    // }

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
                                onChange={e => setUsername(e.target.value)}
                            />
                        </div>
                        <div className="form-group mt-3">
                            <label className='fs-6'>Mật khẩu</label>
                            <input
                                type="password"
                                className="form-control mt-1"
                                placeholder="Nhập mật khẩu"
                                onChange={e => setPassword(e.target.value)}
                            />
                        </div>
                        <p className="text-center fs-6 mt-3 text-danger Auth-warning">*Tên đăng nhập hoặc mật khẩu không trùng khớp!</p>
                        <div className="d-grid gap-2 mt-4">
                            <button type="submit" className="btn btn-primary" onClick={submitForm}>
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
