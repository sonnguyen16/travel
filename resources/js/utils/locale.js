import { getCookie, setCookie } from '@/i18n.js'

// Hàm khởi tạo ngôn ngữ từ cookie/localStorage
export const initializeLocale = (locale) => {
    if (typeof window === 'undefined') return

    const cookieLocale = getCookie('user-locale')
    const localStorageLocale = localStorage.getItem('user-locale')

    if (cookieLocale && ['vi', 'en', 'ko'].includes(cookieLocale)) {
        locale.value = cookieLocale
        // Đồng bộ localStorage nếu cần
        if (localStorageLocale !== cookieLocale) {
            localStorage.setItem('user-locale', cookieLocale)
        }
    } else if (localStorageLocale && ['vi', 'en', 'ko'].includes(localStorageLocale)) {
        locale.value = localStorageLocale
        setCookie('user-locale', localStorageLocale, 30)
    }
}

// Hàm thay đổi ngôn ngữ
export const changeLocale = (locale, code) => {
    const langCode = code.toString().toLowerCase()
    locale.value = langCode

    // Lưu ngôn ngữ vào localStorage
    if (typeof window !== 'undefined') {
        localStorage.setItem('user-locale', langCode)
    }

    // Lưu ngôn ngữ vào cookie (hoạt động với SSR)
    setCookie('user-locale', langCode, 30)
}
