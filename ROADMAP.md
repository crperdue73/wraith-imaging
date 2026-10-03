# WRAITH — Roadmap

Owner: Ezra 🛡️ (WRAITH project owner). Upstream: [FOG Project](https://github.com/FOGProject/fogproject).
Attribution/license obligations: see [NOTICE](NOTICE).

The public/marketing name of a WRAITH release is the product surface only; the
underlying version line tracks the upstream FOG Project baseline until we cut a
WRAITH-own minor line (see item 4 under Housekeeping).

---

## Phase 1 — Full rebrand ✅ DONE (2026-08-14, commit `3209a8acc`)

- FOG → WRAITH across content and filenames (504 files), installer
  (`installfog.sh` → `installwraith.sh`), services, database (`wraith`).
- `scripts/rebrand.sh` (replayable) + `scripts/verify-rebrand.sh` (CI gate).
- Raven-violet theme, shield mark, favicon.

## Phase 2 — Custom options & lab feature work ✅ (first slice DONE 2026-08-15, commit `ca27ed6c`)

Delivered:
- Per-host default boot: `hosts.hostBootMenu` column, Host-page dropdown,
  `bootmenu.class.php` override (host default beats global default),
  schema migration **275**.
- ISO Manager (`node=isomanager`): upload ISO → `/images/custom-isos`,
  auto-creates a memdisk `pxeMenu` entry; delete removes both; added to nav.
- Seeded `wraith.ltsp` entry chaining to the LTSP terminal server.

Still in scope for Phase 2 (not yet done):
- **Plugin architecture**: stable hook/event model; enable/disable from GUI.
- **Multi-step imaging workflows** (YAML): deploy → domain join → software →
  compliance check → report, with per-host progress and failure alerts.
- **n8n post-imaging webhook** on the final workflow step (machine identity,
  image, status) to chain downstream orchestration.
- **Image versioning & deprecation policy** (`version`, `deprecated_at`,
  `archived` columns; deploy-time warnings).
- **Re-registration bridge** so machines still running the upstream FOG client
  can register against a WRAITH server during cutover.

## Phase 3 — Dashboard

In-page Vue 3 SPA mounted into the existing PHP layout (no separate service,
no duplicate auth). Chart.js for trends, SSE for live task feed, Tailwind for
CSS. Pages: Overview, Hosts, Tasks, Images, Snap-ins, Reports, Compliance,
Settings. REST API under `/api/v1/...`. (Design captured; not started.)

## Phase 4 — Deployment pipeline

GitHub Actions: rebrand gate → web asset build → client build → package →
artifact. `deploy-wraith.sh` provisioning. UPSTREAM_VERSION tracking on every
base. (Planned.)

## Phase 5 — Testing & cutover

Staging VLAN for PXE isolation (never test PXE next to production FOG),
unit/integration tests, Win11 image round-trip, client test, dashboard
Playwright pass, security scan. Cutover checklist + rollback documented.
(Planned.)

---

## Housekeeping / open items

1. **GPL attribution** — done in this change (README + NOTICE + UPSTREAM_VERSION).
2. **Rebrand-script exceptions** — done (`scripts/rebrand.sh` allowlist +
   LICENSE/copyright guards; `verify-rebrand.sh` allowlist).
3. **README/docs refresh** — OS support corrected, doc URLs normalized.
   ⚠️ `wraithproject.org` / `docs.wraithproject.org` / the GitHub org are
   **unconfirmed as resolvable** — see decision below.
4. **Version divergence** — **done**: WRAITH now cuts its own line at
   `1.6.0.0` (`WRAITH_VERSION`), with `WRAITH_RELEASE = wraith-1.6.0.0` and the
   tracked upstream baseline exposed as `WRAITH_UPSTREAM_BASELINE`. See D3.
5. **Remote-URL cleanup** — `status/mainversion.php` and other endpoints
   pointed at `WRAITHProject/wraithproject`; repointed to the real fork
   (`crperdue73/wraith-imaging`). The release-check still assumes public
   availability (see decision).
6. **Secret scan (2026-10-02)** — `gitleaks git --all` over the full history:
   33 hits, **all upstream FOG artifacts** (default FTP passwords in a historical
   `config.class.php`, client PASSKEYs, jpgraph base64 false positives); none
   introduced by WRAITH. Independent full-blob scan found **no** private keys,
   PATs, AWS/GH/Slack tokens, deploy keys, internal hostnames, or personal data
   in content. Two **upstream default AES keys** are still seeded in
   `packages/web/commons/schema.php` (`WRAITH_AES_PASS_ENCRYPT_KEY`,
   `WRAITH_AES_ADPASS_ENCRYPT_KEY`). Recommend generating a random key per
   install instead of shipping the known upstream default. Tracked, **not yet
   fixed** (touches existing-install compatibility).
7. **Commit metadata** — our commits carry `ezra@crperdue.com` and
   `root@debian.crperdue.com`, which become public on flip. Consider a
   `.mailmap` to display-neutralize, or accept it as the maintainer identity.

## Publish sequencing (do not reorder)

1. Attribution in the tree — **done** (`ae49d1713`).
2. Push the fork.
3. Confirm the *public* tree still shows the attribution.
4. **Only then** flip visibility.

Publishing before the attribution is public would briefly expose an
un-attributed GPLv3 derivative. And the push is the same decision as the flip —
it waits on Robbie.

## Open decisions (need Robbie)

- **D3 — Version line (owner call, made):** WRAITH cuts its own line at
  `1.6.0.0` rather than tracking FOG's `1.5.10.x`. Rationale: the product has
  diverged (rebrand + per-host boot, ISO Manager, LTSP chaining), and a support
  ticket must be able to tell a WRAITH install from an upstream one at a glance.
  The upstream baseline each release is built from stays recorded
  (`UPSTREAM_VERSION`, `WRAITH_UPSTREAM_BASELINE`) so the FOG mapping is never
  lost. Reversible: revert the two constants if the org prefers to keep the
  numeric baseline.
- **D1 — Publish (RESOLVED 2026-10-02): publish.** Sequence: push attribution →
  verify → flip public. Push **done** (`f9d8007e7`); attribution verified live in
  the pushed tree (NOTICE, README upstream section, GPLv3 LICENSE). **The flip is
  an owner action:** the agent holds only a push deploy key (`wraith-deploy-key`),
  no admin token, so visibility can only be changed by Robbie in GitHub
  (repo → Settings → General → Danger Zone → Change visibility). Publish target is
  the existing `crperdue73/wraith-imaging`; since `wraithproject.org` does not
  exist, README doc/forum links are repointed at the fork.
- **D2 — Brand mark (RESOLVED 2026-10-02): wolf.** The violet shield in the tree
  is the placeholder and is being retired. Awaiting the final wolf assets
  (logo/favicon/login/menubar/palette) before the asset pass.
