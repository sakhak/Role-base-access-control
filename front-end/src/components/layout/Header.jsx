// import React from "react";
import { Layout, Dropdown, Avatar, Badge, Button } from "antd";
import {
    BellOutlined,
    UserOutlined,
    // MenuFoldOutlined,
    // MenuUnfoldOutlined,
    LogoutOutlined,
} from "@ant-design/icons";

const { Header } = Layout;

function AppHeader({ user, simple = false }) {
    const items = [
        {
            key: "1",
            label: "Profile",
            icon: <UserOutlined />,
        },
        {
            key: "2",
            label: "Logout",
            icon: <LogoutOutlined />,
        },
    ];

    return (
        <Header className="bg-white shadow-sm flex items-center justify-between px-6">
            <div className="flex items-center">
                {!simple && (
                    <>
                        <Button
                            type="text"
                            //   icon={false ? <MenuUnfoldOutlined /> : <MenuFoldOutlined />}
                            className="mr-2"
                        />
                        <h2 className="text-lg font-semibold mb-0">
                            {user?.role === "super_admin"
                                ? "Super Admin"
                                : user?.role === "admin"
                                ? "Admin"
                                : "client"}{" "}
                            Dashboard
                        </h2>
                    </>
                )}
            </div>

            <div className="flex items-center gap-4">
                <Badge count={5} className="cursor-pointer">
                    <BellOutlined className="text-lg" />
                </Badge>

                <Dropdown menu={{ items }} placement="bottomRight">
                    <div className="flex items-center gap-2 cursor-pointer">
                        <Avatar
                            src="https://randomuser.me/api/portraits/men/1.jpg"
                            icon={<UserOutlined />}
                        />
                        <span className="font-medium">
                            {user?.name || "User"}
                        </span>
                    </div>
                </Dropdown>
            </div>
        </Header>
    );
}

export default AppHeader;
