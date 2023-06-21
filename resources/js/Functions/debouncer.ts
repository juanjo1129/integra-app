export function createDebounce() {
    let timeout = null;

    return function (fn: () => Promise<any>, delay: number = 500) {
        clearTimeout(timeout);

        return new Promise((resolve) => {
            timeout = setTimeout(async () => {
                resolve(await fn());
            }, delay);
        });
    };
}

export const asyncDebounce = createDebounce();
