import React, { useState } from 'react'
import { Link } from 'react-router-dom'
import styled from 'styled-components'
import '../../styles/NavBar.scss';

//cai khung sub menu
const SidebarLink = styled(Link)`
    display: flex;
    color: #e1e9fc;
    justify-content: flex-start;
    align-items: center;
    padding: 15px;
    padding-right: 5px;
    list-style: none;
    height: 55px;
    text-decoration: none;
    font-size: 20px;
    &:hover {
        background: #252831;
        border-left: 4px solid #632ce4;
        cursor: pointer;
    }
`;

//
const SubIcon = styled.div`
    display: flex;
    flex-wrap: wrap;
    font-size: 25px;
    height: 40px;
    width: 40px;
    border-radius: 100%;
    background: rgba(108,114,147,.2);
    text-align: center;
    align-content: center;
    justify-content: center;
    margin-right: 20px;
`;

const SidebarLabel = styled.span`
    font-weight: 600;
    font-size: 15px;
    width: 67%;
`;

//https://cssgradient.io/
const DropdownLink = styled(Link)`
    background: #223047;
    height: 50px;
    padding-left: 40px;
    display: flex;
    align-items: center;
    text-decoration: none;
    color: #fff;
    font-size: 30px;
    &:hover{
        border-left: 4px solid #372ccf;
        // background: #393e4d;
        background: linear-gradient(90deg, rgba(0,87,105,1) 0%, rgba(34,56,87,1) 50%, rgba(31,41,55,1) 100%);
        cursor: pointer;
    }
`

const SubMenu = ({ item }) => {
    const [subnav, setSubnav] = useState(false)

    const showSubnav = () => setSubnav(!subnav)

    return (
        <>
            <SidebarLink to={item.path} onClick={item.subNav && showSubnav}>
                <SubIcon style={{ color: item.color }}>
                    {item.icon}
                </SubIcon>
                {/* <SidebarLabel>{sidebar ? item.title : !sidebar}</SidebarLabel> */}
                <SidebarLabel>{item.title}</SidebarLabel>
                <div>
                    {/* {sidebar ? (item.subNav && subnav ? item.iconOpened : item.subNav ? item.iconClosed : null) : !sidebar} */}
                    {item.subNav && subnav ? item.iconOpened : item.subNav ? item.iconClosed : null}
                </div>
            </SidebarLink>
            {subnav && item.subNav.map((item, index) => {
                return (
                    <DropdownLink to={item.path} key={index}>
                        <SubIcon style={{ color: item.color }}>
                            {item.icon}
                        </SubIcon>
                        <SidebarLabel>{item.title}</SidebarLabel>
                    </DropdownLink>
                )
            })}

        </>
    );
};

export default SubMenu