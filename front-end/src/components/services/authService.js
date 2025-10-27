const users = [
    {
        id: "1",
        name: "Super Admin",
        email: "super@school.com",
        role: "super_admin",
        permissions: ["*"], // Wildcard for all permissions
    },
    {
        id: "2",
        name: "School Admin",
        email: "admin@school.com",
        role: "admin",
        permissions: [
            "manage_students",
            "manage_teachers",
            "view_reports",
            "manage_attendance",
        ],
    },
    {
        id: "3",
        name: "Parent User",
        email: "parent@school.com",
        role: "client",
        // password: "12345678",
        permissions: [
            "view_own_students",
            "view_attendance",
            "view_grades",
            "pay_fees",
        ],
    },
];

export const authService = {
    async login(email, password, role) {
        return new Promise((resolve, reject) => {
            setTimeout(() => {
                const user = users.find(
                    (u) => u.email === email && u.role === role
                );
                if (user) {
                    resolve(user);
                } else {
                    reject(new Error("Invalid credentials or role"));
                }
            }, 500);
        });
    },

    async register(data) {
        return new Promise((resolve) => {
            setTimeout(() => {
                console.log("Registered:", data);
                resolve();
            }, 500);
        });
    },

    async forgotPassword(email) {
        return new Promise((resolve) => {
            setTimeout(() => {
                console.log("Password reset email sent to:", email);
                resolve();
            }, 500);
        });
    },

    getCurrentUser() {
        return users[0];
    },
};
