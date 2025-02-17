export async function fetchApi<T>(
  endpoint: string,
  options?: RequestInit
): Promise<{ success: boolean; data?: T; message?: string }> {
  try {
    const response = await fetch(
      `${process.env.CATCH_DESIGN_API}${endpoint}`,
      options
    );
    if (!response.ok) {
      const errorData = await response.json();
      return {
        success: false,
        message: errorData.message || response.statusText,
      };
    }
    return await response.json();
  } catch (error) {
    return {
      success: false,
      message: error instanceof Error ? error.message : "Unknown error",
    };
  }
}
