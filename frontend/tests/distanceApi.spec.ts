import { calculateDistance } from "../src/services/distanceApi";

it("calls backend and returns distance", async () => {
  (globalThis as any).fetch = vi.fn(() =>
    Promise.resolve({
      ok: true,
      json: () => Promise.resolve({ distance: { meters: 1000, kilometers: 1 } }),
    }),
  );

  const result = await calculateDistance({ lat: 1, lng: 1 }, { lat: 2, lng: 2 });

  expect(result.meters).toBe(1000);
});
